<?php

namespace App\Controller\Admin;

use App\Entity\Commandes;
use App\Entity\Tickets;
use App\Repository\TicketsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MockPaymentController extends AbstractController
{
    #[Route('/mock/payment/{id}', name: 'app_mock-payment')]
    public function pay(
        Commandes $commande,
        EntityManagerInterface $em,
        UrlGeneratorInterface $urlGenerator
    ): Response {
        if ($commande->getPayeeLe() !== null) {
            return new Response('Commande déjà payée', 400);
        }

        $commande->setPayeeLe(new \DateTimeImmutable());

        // Création du ticket
        $ticket = new Tickets();
        $ticket->setCommande($commande)
            ->setUser($commande->getUser());

        $ticketKey = bin2hex(random_bytes(32)); // 64 caractères
        $ticket->setTicketKey($ticketKey);

        $payload = hash('sha256', $commande->getUser()->getAccountKey() . $ticketKey);
        $ticket->setPayloadHash($payload);

        // URL sécurisée pour le QR code
        $ticketUrl = $urlGenerator->generate('app_ticket_show', [
            'ticketKey' => $ticketKey
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        $ticket->setQrCodePath($ticketUrl);

        $em->persist($ticket);
        $em->flush();

        return $this->render('tickets/show.html.twig', [
            'commande' => $commande,
            'ticket' => $ticket,
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
