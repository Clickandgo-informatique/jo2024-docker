<?php

namespace App\Service;

use Mpdf\Mpdf;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Environment;
use App\Entity\Tickets;

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
     * Génère un PDF à partir d'un ticket / commande
     *
     * @param Tickets $ticket
     * @return string Contenu PDF (binaire)
     */
    public function generateTicketPdf(Tickets $ticket): string
    {
        // Nettoyer le QR code SVG pour mpdf
        if ($ticket->getQrCodePath()) {
            $svg = $ticket->getQrCodePath();

            // Supprime la ligne XML
            $svg = preg_replace('/<\?xml.*?\?>\s*/', '', $svg);

            // Supprime DOCTYPE si présent
            $svg = preg_replace('/<!DOCTYPE.*?>\s*/', '', $svg);

            // Optionnel : supprimer xmlns si nécessaire
            $svg = preg_replace('/xmlns="[^"]+"/', '', $svg);

            $ticket->setQrCodePath($svg);
        }

        // Render Twig
        $html = $this->twig->render('pdf/tickets-pdf.html.twig', [
            'ticket' => $ticket,
        ]);

        $mpdf = new Mpdf([
            'tempDir' => $this->params->get('kernel.project_dir') . '/var/tmp',
            'format' => 'A4',
        ]);

        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

        return $mpdf->Output('', 'S'); // Retourne le PDF binaire
    }
}
