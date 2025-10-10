<?php

namespace App\Service;

use Mpdf\Mpdf;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Environment;
use App\Entity\Tickets;

/**
 * Service pour générer des PDF de tickets.
 *
 * Fonctionnalités :
 * - Utilise Twig pour rendre le ticket en HTML.
 * - Convertit le QR code SVG en base64 pour affichage dans le PDF.
 * - Applique la police Verdana pour compatibilité PDF/navigateur.
 */
class PdfGenerator
{
    private Environment $twig;
    private ParameterBagInterface $params;

    public function __construct(Environment $twig, ParameterBagInterface $params)
    {
        $this->twig = $twig;
        $this->params = $params;
    }

    /**
     * Génère un PDF pour un ticket donné.
     *
     * @param Tickets $ticket Entité Ticket à afficher dans le PDF
     * @return string Contenu PDF binaire
     */
    public function generateTicketPdf(Tickets $ticket): string
    {
        // 🔹 Préparer le QR code pour le PDF
        $qrCodeBase64 = null;
        if ($ticket->getQrcodePath()) {
            // Utilisation de BaconQrCode pour générer le QR code SVG
            $renderer = new \BaconQrCode\Renderer\ImageRenderer(
                new \BaconQrCode\Renderer\RendererStyle\RendererStyle(150),
                new \BaconQrCode\Renderer\Image\SvgImageBackEnd() // compatible v3
            );
            $writer = new \BaconQrCode\Writer($renderer);

            // Génération du QR code en SVG
            $svg = $writer->writeString($ticket->getQrcodePath());

            // Encodage en base64 pour l'injection dans le HTML
            $qrCodeBase64 = 'data:image/svg+xml;base64,' . base64_encode($svg);
        }

        // 🔹 Rendu du template Twig (utilise ticket-show.html.twig)
        $html = $this->twig->render('tickets/ticket-pdf.html.twig', [
            'ticket' => $ticket,
            'commande' => $ticket->getCommande(),
            'qrCodeBase64' => $qrCodeBase64,
        ]);

        // 🔹 Initialisation de mPDF
        $mpdf = new Mpdf([
            'tempDir' => $this->params->get('kernel.project_dir') . '/var/tmp',
            'format' => 'A4',
            'default_font' => 'Verdana', // ✅ Police Verdana
        ]);

        // 🔹 Écriture du HTML dans le PDF
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

        // 🔹 Retourne le PDF binaire
        return $mpdf->Output('', 'S'); // 'S' = retourner le contenu au lieu d'envoyer au navigateur
    }
}
