<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class PaiementCommandesController extends AbstractController
{
#[Route('commandes/paiement-commandes','app_commandes_paiement')]
    public function index(): Response
    {
        return $this->render('commandes/paiement-commandes.html.twig');
    }
}
