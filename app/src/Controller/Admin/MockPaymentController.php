<?php

namespace App\Controller\Admin;

use App\Entity\Commandes;
use App\Entity\Tickets;
use Doctrine\ORM\EntityManagerInterface;
use PragmaRX\Google2FAQRCode\Google2FA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MockPaymentController extends AbstractController
{
    #[Route('/mock/payment/{id}', name: 'app_mock-payment')]
    public function pay(
        Commandes $commande,
        EntityManagerInterface $em
    ): Response {
        //Si il existe une date de paiement enregistrée alors on renvoie une erreur
        if ($commande->getPayeeLe() !== null) {
            return new Response('Commande déjà payée', 400);
        }

        // On simule que la commande est payée       
        $commande->setPayeeLe(new \DateTimeImmutable());

        // Génération du ticket
        $ticket = new Tickets();
        $ticket->setCommande($commande);
        $ticket->setUser($commande->getUser());

        $ticketKey = bin2hex(random_bytes(16));
        $ticket->setTicketKey($ticketKey);

        $payload = hash('sha256', $commande->getUser()->getAccountKey() . $ticketKey);

        $ticket->setPayloadHash($payload);

        $google2fa = new Google2FA();
        $qrCodeSvg = $google2fa->getQRCodeInline(
            'JO2024-reservations',
            $commande->getUser()->getEmail(),
            $payload,
            300
        );

        $ticket->setQrCodePath($qrCodeSvg);

        $em->persist($ticket);
        $em->flush();

        // 👉 On passe le ticket à une vue Twig
        return $this->render('tickets/show.html.twig', [
            'commande' => $commande,
            'ticket' => $ticket,
        ]);
    }
}
