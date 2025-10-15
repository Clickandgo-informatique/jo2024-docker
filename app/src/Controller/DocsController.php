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
        $projectDir = $this->getParameter('kernel.project_dir');

        // Détection automatique du dossier docs selon l'environnement
        $pathsToTry = [
            $projectDir . '/docs',      // distant / OVH
            $projectDir . '/app/docs',  // local / Docker
        ];

        $docsDir = null;
        foreach ($pathsToTry as $path) {
            if (is_dir($path)) {
                $docsDir = $path;
                break;
            }
        }

        if (!$docsDir) {
            throw $this->createNotFoundException(
                "Le dossier docs est introuvable. Chemins testés : " . implode(', ', $pathsToTry)
            );
        }

        // Liste tous les fichiers Markdown disponibles
        $availableFiles = array_map(
            fn($f) => basename($f, '.md'),
            glob($docsDir . '/*.md')
        );

        // Vérifie si le fichier demandé existe
        if (!in_array($filename, $availableFiles, true)) {
            throw $this->createNotFoundException(
                "Le fichier '$filename.md' est introuvable. " .
                    "Fichiers disponibles : " . implode(', ', $availableFiles)
            );
        }

        $path = $docsDir . '/' . $filename . '.md';
        $markdown = file_get_contents($path);

        // Génération automatique de la table des matières
        preg_match_all('/^(#{1,6})\s*(.+)$/m', $markdown, $matches, PREG_SET_ORDER);
        $toc = [];
        foreach ($matches as $match) {
            $level = strlen($match[1]);
            $title = trim($match[2]);
            $id = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $title));
            $toc[] = str_repeat('  ', $level - 1) . "- [{$title}](#{$id})";
        }

        $tocMarkdown = implode("\n", $toc);
        $markdown = str_replace('[TOC]', $tocMarkdown, $markdown);

        $html = $parser->toHtml($markdown);

        return $this->render('docs/index.html.twig', [
            'content' => $html,
            'filename' => $filename,
            'availableFiles' => $availableFiles, // pour affichage dans Twig si besoin
        ]);
    }
}
