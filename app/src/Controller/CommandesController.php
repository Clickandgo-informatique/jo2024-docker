<?php

namespace App\Controller;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Repository\CommandesRepository;
use App\Repository\OffresRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commandes', 'app_commandes_')]
class CommandesController extends AbstractController
{

    #[Route('/ajout', 'ajout')]
    public function index(SessionInterface $session, OffresRepository $offresRepo, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []);

        if ($panier === []) {
            $this->addFlash('message', 'Votre panier est vide');
            $this->redirectToRoute('app_main');
        }

        //On crée la commande car le panier contient des articles
        $commande = new Commandes();

        //On renseigne le client
        $commande->setUser($this->getUser());

        //On crée un référence
        $commande->setReference(uniqid());

        //Parcours du panier pour créer les lignes de détail
        //de la commande

        foreach ($panier as $item => $quantity) {
            $detailsCommande = new DetailsCommandes();

            //Recherche de l'offre
            $offre = $offresRepo->find($item);
            $prix = $offre->getPrix();

            //Création de la ligne
            $detailsCommande
                ->setOffres($offre)
                ->setPrix($prix)
                ->setQuantite($quantity);

            //On ajoute les lignes de détails à la commande correspondante
            $commande->addDetailsCommande($detailsCommande);
        }
        //On enregistre la commande en cours
        $em->persist($commande);
        $em->flush();

        //On vide le panier
        $session->remove('panier');

        $this->addFlash('success', 'Votre commande a bien été prise en compte. Merci.');
        return $this->redirectToRoute('app_commandes_liste');
    }

    //Affichage de la liste commandes du client en front-end et status du scan qrcode
    #[Route('/liste', 'liste')]
    public function liste(CommandesRepository $commandesRepo, Request $request): Response
    {
        $user = $this->getUser();
        $status = $request->query->get('status'); // récupère ?status=

        $criteria = ['user' => $user];

        if ($status === 'scanne') {
            $criteria['dateScan'] = ['not' => null]; // hack Doctrine custom
            $commandes = $commandesRepo->createQueryBuilder('c')
                ->where('c.user = :user')
                ->andWhere('c.dateScan IS NOT NULL')
                ->setParameter('user', $user)
                ->orderBy('c.created_at', 'DESC')
                ->getQuery()
                ->getResult();
        } elseif ($status === 'non-scanne') {
            $commandes = $commandesRepo->createQueryBuilder('c')
                ->where('c.user = :user')
                ->andWhere('c.dateScan IS NULL')
                ->setParameter('user', $user)
                ->orderBy('c.created_at', 'DESC')
                ->getQuery()
                ->getResult();
        } else {
            $commandes = $commandesRepo->findBy(['user' => $user], ['created_at' => 'DESC']);
        }

        return $this->render('commandes/index.html.twig', compact('commandes', 'status'));
    }


    //Affichage d'une commande individuelle et paiement (front-end)
    #[Route('/mock/payment/{id}', 'paiement')]
    public function payerCommande($id, CommandesRepository $commandesRepo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $commande = $commandesRepo->find($id);

        return $this->render('commandes/show.html.twig', compact('commande'));
    }

    //Affichage de la liste des commandes client dans le backend
    #[Route('/liste-commandes-client/{id}', methods: ['GET'], name: 'commandes-client')]
    public function listeCommandesClient(string $id, UsersRepository $usersRepo, PaginatorInterface $paginator, Request $request): Response
    {
        //On cherche l'utilisateur
        $user = $usersRepo->find($id);

        //On cherche les commandes  de l'utilisateur
        $data = $user->getCommandes();
        $commandes = $paginator->paginate($data, $request->query->getInt('page', 1), 12);

        //On affiche la vue
        return $this->render('commandes/liste-commandes-client.html.twig', compact('commandes'));
    }
    #[Route('/{id}/supprimer', name: 'supprimer', methods: ['POST'])]
    public function supprimer($id, CommandesRepository $commandesRepo, EntityManagerInterface $em, Request $request): Response
    {
        $commande = $commandesRepo->find($id);
        //on vérifie le token
        if ($this->isCsrfTokenValid('supprimer' . $commande->getId(), $request->request->get('_token'))) {
            $em->remove($commande);
            $em->flush();

            $this->addFlash('success', 'La commande a été supprimée de la base avec succès.');
        }
        return  $this->redirectToRoute('app_commandes_commandes-client');
    }
}
