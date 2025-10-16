<?php

namespace App\Controller;

use App\Repository\OffresRepository;
use App\Repository\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(OffresRepository $offresRepo, SportsRepository $sportsRepo): Response
    {
        //Affiche les offres en promotion dans la première page
        $offres = $offresRepo->findBy(['isPromoted' => true]);

        //Affiche les fiches de sports en accordion
        $sports = $sportsRepo->findBy([], ['intitule' => 'ASC']);
        return $this->render('main/index.html.twig', ['offres' => $offres, 'sports' => $sports]);
    }
}
