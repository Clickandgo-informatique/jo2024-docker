<?php

namespace App\Controller\Admin;

use App\Repository\CommandesRepository;
use App\Repository\TicketsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MockPaymentController extends AbstractController
{
    /**
     * Affiche la commande pour le paiement mock.
     * Vérifie que la commande appartient à l’utilisateur connecté.
     *
     * @param int $id
     * @param CommandesRepository $commandesRepo
     * @return Response
     */
    #[Route('/mock/payment/{id}', name: 'paiement_commande')]
    public function payerCommande(int $id, CommandesRepository $commandesRepo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

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

        // Vérifie que la commande appartient à l'utilisateur
        if ($commande->getUser()->getId() !== $user->getId()) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à accéder à cette commande.');
            return $this->redirectToRoute('app_commandes_liste');
        }

        return $this->render('commandes/show.html.twig', [
            'commande' => $commande
        ]);
    }

    // Afficher un ticket via ticketKey
    #[Route('/ticket/{ticketKey}', name: 'app_ticket_show')]
    public function showTicketByKey(
        string $ticketKey,
        TicketsRepository $ticketsRepo
    ): Response {
        $ticket = $ticketsRepo->findOneBy(['ticketKey' => $ticketKey]);
        if (!$ticket) {
            throw $this->createNotFoundException('Ticket invalide.');
        }

        $commande = $ticket->getCommande();
        return $this->render('tickets/show.html.twig', compact('ticket', 'commande'));
    }
}
