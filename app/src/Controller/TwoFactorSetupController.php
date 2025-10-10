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

        if (!$user->getGoogle2FASecret()) {
            $this->addFlash('error', 'Aucun secret trouvé pour cet utilisateur.');
            return $this->redirectToRoute('app_main');
        }

        $qrCodeSvg = $totpService->getQRCode($user);

        if ($request->isMethod('POST')) {
            $otp = $request->request->get('code');

            if ($totpService->verifyCode($user, $otp)) {
                $user->setIs2FAEnabled(true);
                $em->persist($user);
                $em->flush();

                // ✅ 2FA validé → pose la session
                $request->getSession()->set('2fa_passed', true);

                $this->addFlash('success', 'Double authentification activée avec succès ✅');

                // 🔹 Redirection selon rôle
                if ($this->isGranted('ROLE_ADMIN')) {
                    return $this->redirectToRoute('admin_dashboard');
                }
                return $this->redirectToRoute('app_main');
            }

            $this->addFlash('danger', 'Code invalide ❌. Veuillez réessayer.');
        }

        return $this->render('security/setup_2fa.html.twig', [
            'qrCodeSvg' => $qrCodeSvg,
        ]);
    }
}
