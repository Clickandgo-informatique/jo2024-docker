<?php

namespace App\Controller;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Repository\CommandesRepository;
use App\Repository\OffresRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    //Affichage de la liste commandes du client et status du scan qrcode
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


    //Affichage d'une commande individuelle et paiement
    #[Route('/mock/payment/{id}', 'paiement')]
    public function payerCommande($id, CommandesRepository $commandesRepo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $commande = $commandesRepo->find($id);

        return $this->render('commandes/show.html.twig', compact('commande'));
    }
}
