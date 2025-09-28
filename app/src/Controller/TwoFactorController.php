<?php
// TwoFactorController.php

namespace App\Controller;

use App\Entity\Users;
use PragmaRX\Google2FA\Google2FA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/2fa', name: '2fa_')]
class TwoFactorController extends AbstractController
{
    #[Route('/verify', name: 'verify', methods: ['GET'])]
    public function showVerify(): Response
    {
        /** @var Users $user */
        $user = $this->getUser();

        if (!$user || !$user->is2FAEnabled()) {
            $this->addFlash('warning', '2FA non activée pour cet utilisateur.');
            return $this->redirectToRoute('panier_index');
        }

        return $this->render('security/2fa_verify.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/check', name: 'check', methods: ['POST'])]
    public function verify(Request $request, SessionInterface $session): Response
    {
      
        /** @var Users $user */
        $user = $this->getUser();

        if (!$user || !$user->is2FAEnabled()) {
            $this->addFlash('error', 'Utilisateur non authentifié ou 2FA non activée.');
            return $this->redirectToRoute('panier_index');
        }

        $code = $request->request->get('totp_code', '');

        $google2fa = new Google2FA();

        if ($google2fa->verifyKey($user->getGoogle2FASecret(), $code)) {
            $session->set('2fa_passed', true);
            $this->addFlash('success', 'Authentification 2FA réussie.');
            return $this->redirectToRoute('panier_index');
        }

        $this->addFlash('error', 'Code 2FA invalide.');
        return $this->redirectToRoute('2fa_verify');
    }
}
