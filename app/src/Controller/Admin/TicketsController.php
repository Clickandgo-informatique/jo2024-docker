<?php

namespace App\Controller\Admin;

use App\Repository\TicketsRepository;
use App\Service\PdfGenerator;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TicketsController extends AbstractController
{
    #[Route('/admin/tickets/{id}/show', name: 'admin_ticket_show')]
    public function showTicket(
        string $id,
        TicketsRepository $ticketsRepo,
        EntityManagerInterface $em
    ): Response {
        $ticket = $ticketsRepo->find($id);

        if (!$ticket) {
            throw $this->createNotFoundException('Ticket introuvable.');
        }

        $qrCodeSvg = null;

        // Vérifier si qrCodePath contient déjà du SVG
        $qrCodePath = $ticket->getQrCodePath();
        if ($qrCodePath && str_contains($qrCodePath, '<svg')) {
            $qrCodeSvg = $qrCodePath;
        } else {
            // Génération SVG inline
            $ticketKey = $ticket->getTicketKey();
            $urlToEncode = $this->generateUrl('admin_tickets_scan', ['ticketKey' => $ticketKey], true);

            $renderer = new \BaconQrCode\Renderer\ImageRenderer(
                new RendererStyle(250),
                new SvgImageBackEnd()
            );
            $writer = new Writer($renderer);
            $qrCodeSvg = $writer->writeString($urlToEncode);

            // Optionnel : stocker le SVG dans qrCodePath pour réutilisation
            $ticket->setQrCodePath($qrCodeSvg);
            $em->persist($ticket);
            $em->flush();
        }

        return $this->render('tickets/ticket-show.html.twig', [
            'ticket' => $ticket,
            'qrCodeUrl' => $qrCodeSvg,
        ]);
    }
    //Génération de tickets pour chaque commande en format PDF
    #[Route('/admin/tickets/{id}/show-pdf', name: 'admin_tickets_show_pdf')]
    public function ticketsPdf(string $id,TicketsRepository $ticketsRepo, PdfGenerator $pdfGenerator): Response
    {
        $ticket = $ticketsRepo->find($id);

        $pdfContent = $pdfGenerator->generateTicketPdf($ticket);

        return new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="tickets.pdf"',
        ]);
    }
}
