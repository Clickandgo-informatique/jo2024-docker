<?php

namespace App\Controller;

use App\Service\MarkdownParser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DocsController extends AbstractController
{
    #[Route('/docs/{filename}', name: 'app_docs_file')]
    public function show(string $filename, MarkdownParser $parser): Response
    {
        $path = $this->getParameter('kernel.project_dir') . '/docs/' . $filename . '.md';
        dd($path);
        if (!file_exists($path)) {
            throw $this->createNotFoundException("Le fichier '$filename.md' est introuvable.");
        }

        $markdown = file_get_contents($path);

        // --- 1️⃣ Génération automatique de la table des matières ---
        // On cherche toutes les lignes qui commencent par #, ##, ###, etc.
        preg_match_all('/^(#{1,6})\s*(.+)$/m', $markdown, $matches, PREG_SET_ORDER);

        $toc = [];
        foreach ($matches as $match) {
            $level = strlen($match[1]); // niveau du titre (# -> h1, ## -> h2, etc.)
            $title = trim($match[2]);
            $id = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $title)); // id "ancre"
            $toc[] = str_repeat('  ', $level - 1) . "- [{$title}](#{$id})";
        }

        // Construction du markdown du TOC
        $tocMarkdown = implode("\n", $toc);

        // Remplacement de [TOC] par la table des matières
        $markdown = str_replace('[TOC]', $tocMarkdown, $markdown);

        // --- 2️⃣ Conversion Markdown → HTML ---
        $html = $parser->toHtml($markdown);

        return $this->render('docs/index.html.twig', [
            'content' => $html,
            'filename' => $filename,
        ]);
    }
}
