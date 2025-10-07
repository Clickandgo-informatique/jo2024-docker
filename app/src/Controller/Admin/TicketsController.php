<?php

namespace App\Controller\Admin;

use App\Repository\TicketsRepository;
use App\Service\PdfGenerator;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur pour la gestion des tickets
 *
 * - Affichage HTML du ticket avec QR code
 * - Génération PDF du ticket
 */
class TicketsController extends AbstractController
{
    /**
     * Affiche un ticket avec QR code SVG base64.
     *
     * Le QR code encode simplement l'URL du ticket (/ticket/{ticketKey}),
     * ce qui évite d’avoir un gros binaire en base et permet de l’utiliser
     * à la fois pour l’affichage navigateur et le PDF.
     *
     * @param string $ticketKey Clé unique du ticket
     * @param TicketsRepository $ticketsRepo Repository des tickets
     */
    #[Route('/ticket/{ticketKey}', name: 'app_ticket_show', methods: ['GET'])]
    public function showTicketByKey(
        string $ticketKey,
        TicketsRepository $ticketsRepo
    ): Response {
        // 🔍 Récupération du ticket depuis la base
        $ticket = $ticketsRepo->findOneBy(['ticketKey' => $ticketKey]);
        if (!$ticket) {
            throw $this->createNotFoundException('Ticket invalide.');
        }

        $commande = $ticket->getCommande();

        // 🧩 Génération du QR code SVG à la volée
        $qrCodeBase64 = null;
        if ($ticket->getQrcodePath()) {
            $renderer = new ImageRenderer(
                new RendererStyle(200),
                new SvgImageBackEnd() // Compatible BaconQrCode v3
            );
            $writer = new Writer($renderer);

            // On encode juste l'URL du ticket dans le QR code
            $svg = $writer->writeString(
                $this->generateUrl(
                    'app_ticket_show',
                    ['ticketKey' => $ticketKey],
                    \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL
                )
            );

            // Encodage base64 pour affichage <img src="...">
            $qrCodeBase64 = 'data:image/svg+xml;base64,' . base64_encode($svg);
        }

        // 🖼️ Rendu du template HTML du ticket
        return $this->render('tickets/ticket-show.html.twig', [
            'ticket' => $ticket,
            'commande' => $commande,
            'qrCodeBase64' => $qrCodeBase64
        ]);
    }

    /**
     * Génère le PDF d’un ticket via le service PdfGenerator.
     *
     * @param string $ticketKey
     * @param TicketsRepository $ticketsRepo
     * @param PdfGenerator $pdfGenerator
     */
    #[Route('/ticket/{ticketKey}/pdf', name: 'app_ticket_pdf', methods: ['GET'])]
    public function downloadTicketPdf(
        string $ticketKey,
        TicketsRepository $ticketsRepo,
        PdfGenerator $pdfGenerator
    ): Response {
        // 🔍 Récupération du ticket
        $ticket = $ticketsRepo->findOneBy(['ticketKey' => $ticketKey]);
        if (!$ticket) {
            throw $this->createNotFoundException('Ticket invalide.');
        }

        // 📝 Génération du PDF
        $pdfContent = $pdfGenerator->generateTicketPdf($ticket);

        // 📤 Retour du PDF directement dans le navigateur (inline)
        return new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="ticket_' . $ticket->getId() . '.pdf"'
        ]);
    }
}
