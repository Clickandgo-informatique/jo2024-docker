<?php

namespace App\Controller\Admin;

use App\Repository\DetailsCommandesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends AbstractController
{
    //Les 10 meilleures ventes d'offres
    #[Route('/admin/stats-ventes-offres-top-ten', name: 'stats_ventes_offres_top_ten')]
    public function ventes(DetailsCommandesRepository $repo): JsonResponse
    {
        $top10 = $repo->les10MeilleuresVentesOffres();

        $labels = [];
        $data = [];
        $colors = [];

        $sportColors = [
            1 => '#FF6384',
            2 => '#36A2EB',
            3 => '#FFCE56',
            4 => '#4BC0C0',
            5 => '#9966FF',
            6 => '#FF9F40',
        ];

        foreach ($top10 as $row) {
            $labels[] = $row['emoji'] . ' ' . $row['offre'];
            $data[] = $row['totalVentes'];
            $colors[] = $sportColors[$row['sport_id']] ?? '#cccccc';
        }
        return $this->json([
            'labels' => $labels,
            'data' => $data,
            'colors' => $colors,
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

        return $this->json([
            'labels' => $labels,
            'data' => $data,
            'colors' => $colors
        ]);
    }
}
