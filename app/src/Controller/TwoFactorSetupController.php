<?php

namespace App\Controller;

use App\Entity\Users;
use App\Service\TOTPService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwoFactorSetupController extends AbstractController
{
    #[Route('/2fa/setup', name: 'app_2fa_setup')]
    public function setup(
        Request $request,
        EntityManagerInterface $em,
        TOTPService $totpService
    ): Response {
        /** @var Users|null $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Génération du secret si inexistant
        if (!$user->getGoogle2FASecret()) {
            $secret = $totpService->generateSecret();
            $user->setGoogle2FASecret($secret);
            $em->persist($user);
            $em->flush();
        }

        $qrCode = $totpService->getQRCode($user);

        if ($request->isMethod('POST')) {
            $code = $request->request->get('code');

            if ($totpService->checkCode($user, $code)) {
                $user->setIs2FAEnabled(true);
                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Double authentification activée avec succès ✅');

                return $this->redirectToRoute('app_main');
            }

            $this->addFlash('error', 'Code invalide ❌. Veuillez réessayer.');
        }

        return $this->render('security/setup_2fa.html.twig', [
            'user' => $user,
            'qrCode' => $qrCode,
        ]);
    }
}
