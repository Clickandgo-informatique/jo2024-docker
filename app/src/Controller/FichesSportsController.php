<?php

namespace  App\Controller;

use App\Repository\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class FichesSportsController extends AbstractController
{
    #[Route(path: '/sports/fiches-sports', name: 'app_fiches_sports')]
    public function show(SportsRepository $sportsRepo): Response
    {
        $sports = $sportsRepo->findBy([], ['intitule' => 'ASC']);

        return $this->render('_partials/_fiches-sports.html.twig', compact('sports'));
    }
}
