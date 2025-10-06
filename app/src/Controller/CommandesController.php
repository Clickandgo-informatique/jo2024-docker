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
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commandes', name: 'app_commandes_')]
class CommandesController extends AbstractController
{
    #[Route('/ajout', name: 'ajout')]
    public function index(
        Request $request,
        OffresRepository $offresRepo,
        EntityManagerInterface $em
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (empty($panier)) {
            $this->addFlash('warning', 'Votre panier est vide.');
            return $this->redirectToRoute('app_main');
        }

        /** @var \App\Entity\Users $user */
        $user = $this->getUser();
        if (!$user) {
            throw $this->createAccessDeniedException('Utilisateur non reconnu.');
        }

        $commande = new Commandes();
        $commande->setUser($user);
        $commande->setCreatedAt(new \DateTimeImmutable());
        $commande->setReference(uniqid());

        foreach ($panier as $offreId => $quantity) {
            $offre = $offresRepo->find($offreId);
            if (!$offre) continue;

            $detailsCommande = new DetailsCommandes();
            $detailsCommande
                ->setOffres($offre)
                ->setPrix($offre->getPrix())
                ->setQuantite($quantity)
                ->setCommande($commande);

            $commande->addDetailsCommande($detailsCommande);
            $em->persist($detailsCommande);
        }

        $em->persist($commande);
        $em->flush();

        $session->remove('panier');

        $this->addFlash('success', 'Votre commande a bien été prise en compte.');
        return $this->redirectToRoute('app_commandes_liste');
    }

    #[Route('/liste', name: 'liste')]
    public function liste(CommandesRepository $commandesRepo, Request $request): Response
    {
        /** @var \App\Entity\Users $user */
        $user = $this->getUser();
        if (!$user) {
            throw $this->createAccessDeniedException('Utilisateur non reconnu.');
        }

        // Récupère le filtre depuis la query string (scanne / non-scanne)
        $status = $request->query->get('status');

        $qb = $commandesRepo->createQueryBuilder('c')
            ->where('c.user = :user')
            ->setParameter('user', $user)
            ->orderBy('c.createdAt', 'DESC');

        if ($status === 'scanne') {
            $qb->andWhere('c.dateScan IS NOT NULL');
        } elseif ($status === 'non-scanne') {
            $qb->andWhere('c.dateScan IS NULL');
        }

        $commandes = $qb->getQuery()->getResult();

        return $this->render('commandes/index.html.twig', [
            'commandes' => $commandes,
            'status' => $status, // variable Twig pour activer les boutons
        ]);
    }

    #[Route('/liste-commandes-client/{id}', name: 'liste-commandes-client', methods: ['GET'])]
    public function listeCommandesClient(
        int $id,
        UsersRepository $usersRepo,
        PaginatorInterface $paginator,
        Request $request,
        CommandesRepository $commandesRepo
    ): Response {
        $user = $usersRepo->find($id);
        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        $data = $commandesRepo->findBy([], ['createdAt' => 'DESC']);

        $commandes = $paginator->paginate($data, $request->query->getInt('page', 1), 12);

        return $this->render('commandes/liste-commandes-client.html.twig', ['commandes' => $commandes, 'id' => $id]);
    }
    // Supprimer une commande avec contrôle du token csrf
    #[Route('/{id}/supprimer', name: 'supprimer', methods: ['POST'])]
    public function supprimer(
        int $id,
        CommandesRepository $commandesRepo,
        EntityManagerInterface $em,
        Request $request
    ): Response {
        /** @var \App\Entity\Users $user */
        $user = $this->getUser();
        if (!$user) {
            throw $this->createAccessDeniedException('Utilisateur non reconnu.');
        }

        $commande = $commandesRepo->find($id);
        if (!$commande) {
            $this->addFlash('error', 'Commande introuvable.');
            return $this->redirectToRoute('app_commandes_liste');
        }

        if ($commande->getUser()?->getId() !== $user->getId() && !in_array('ROLE_ADMIN', $user->getRoles())) {
            throw $this->createAccessDeniedException('Vous n\'êtes pas autorisé à supprimer cette commande.');
        }

        if ($this->isCsrfTokenValid('supprimer' . $commande->getId(), $request->request->get('_token'))) {
            $em->remove($commande);
            $em->flush();
            $this->addFlash('success', 'La commande a été supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_commandes_liste-commandes-client', ['id' => $user->getId()]);
    }
    /**
     * Affiche une commande individuelle pour le paiement (mock).
     * Vérifie que l'utilisateur est propriétaire de la commande.
     */
    #[Route('/show/{id}', name: 'show')]
    public function show(int $id, CommandesRepository $commandesRepo): Response
    {
        /** @var \App\Entity\Users $user */
        $user = $this->getUser();
        if (!$user instanceof \App\Entity\Users) {
            throw $this->createAccessDeniedException('Utilisateur non reconnu.');
        }

        $commande = $commandesRepo->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande introuvable.');
            return $this->redirectToRoute('app_commandes_liste');
        }

        // Vérifie que l'utilisateur est bien propriétaire de la commande
        if ($commande->getUser()->getId() !== $user->getId()) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à consulter cette commande.');
            return $this->redirectToRoute('app_commandes_liste');
        }

        return $this->render('commandes/show.html.twig', [
            'commande' => $commande
        ]);
    }
}
