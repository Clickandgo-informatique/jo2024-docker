<?php

namespace App\Controller;

use App\Repository\OffresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(OffresRepository $offresRepo): Response
    {
        $offres = $offresRepo->findBy(['isPromoted' => true]);
    
        return $this->render('main/index.html.twig', ['offres' => $offres]);
    }
}
