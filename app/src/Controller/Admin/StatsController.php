<?php

namespace App\Controller\Admin;

use App\Repository\DetailsCommandesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends AbstractController
{
    //Les 10 meilleures ventes d'offres
    #[Route('/admin/stats-ventes-offres-top-ten', name: 'stats_ventes_offres_top_ten')]
    public function ventes(DetailsCommandesRepository $repo): Response
    {
        $top10 = $repo->les10MeilleuresVentesOffres();

        // Concaténer emoji + nom pour l'affichage
        $labels = array_map(fn($row) => $row['emoji'] . ' ' . $row['offre'], $top10);
        $data = array_column($top10, 'totalVentes');

        return $this->render('stats/ventes-offres-top-ten.html.twig', [
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    //Graphique camenbert % de ventes par catégorie
    #[Route('/admin/stats-ventes-offres-par-categories', name: 'stats_ventes_offres_par_categories')]
    public function ventesParCategorie(DetailsCommandesRepository $repo): Response
    {
        $results = $repo->pourcentageParCategorieOffres();

        $labels = array_column($results, 'categorie');
        $data = array_column($results, 'totalVentes');

        // Couleurs fixes ou aléatoires pour chaque catégorie
        $colors = [
            '#FF6384',
            '#36A2EB',
            '#FFCE56',
            '#4BC0C0',
            '#9966FF',
            '#FF9F40'
        ];

        return $this->render('stats/ventes-offres-par-categories.html.twig', [
            'labels' => $labels,
            'data' => $data,
            'colors' => $colors
        ]);
    }
}
