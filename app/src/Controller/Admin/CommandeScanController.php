<?php
// src/Controller/Admin/CommandeScanController.php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Repository\CommandesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeScanController extends AbstractController
{
    #[Route('/admin/commande/scan/{token}', name: 'admin_commande_scan')]
    public function scanCommande(
        string $token,
        CommandesRepository $repo,
        EntityManagerInterface $em,
        SecurityBundle $security
    ): Response {

        //Récupérer l'utilisateur
        $user = $this->getUser();
        // Récupérer la commande par le token QR
        $commande = $repo->findOneBy(['qrToken' => $token]);

        if (!$commande) {
            throw $this->createNotFoundException('QR code invalide ou commande introuvable');
        }

        // Vérifier le rôle utilisateur
        if (!$user instanceof Users || !$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_SALES_MANAGER')) {
            throw $this->createAccessDeniedException('Accès refusé, vous n\'avez pas les droits suffisants pour accèder à ce service.');
        }

        // Mettre à jour le pointage
        $commande->setDateScan(new \DateTimeImmutable());
        $commande->setScannedBy($user());

        $em->flush();

        // Rediriger vers la fiche commande dans l'admin
        return $this->redirectToRoute('admin_commande_show', [
            'id' => $commande->getId()
        ]);
    }
}
