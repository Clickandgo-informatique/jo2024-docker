<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Service\TOTPService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwoFactorController extends AbstractController
{
    #[Route('/2fa', name: 'app_2fa_verify', methods: ['GET', 'POST'])]
    public function verify(
        Request $request,
        UsersRepository $userRepository,
        TOTPService $totpService,
        EntityManagerInterface $em
    ): Response {
        $session = $request->getSession();
        $userId = $session->get('2fa:userId');

        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }

        $user = $userRepository->find($userId);

        if ($request->isMethod('POST')) {
            $code = $request->request->get('code');

            if ($totpService->verifyCode($user, $code)) {
                // Auth OK → on peut "finaliser" l’authentification
                $session->remove('2fa:userId');
                if ($request->request->get('remember_device')) {
                    $token = bin2hex(random_bytes(32));
                    $user->setTrustedToken($token);
                    $em->persist($user);
                    $em->flush();

                    $response = $this->redirectToRoute('app_main');
                    $response->headers->setCookie(
                        new Cookie('trusted_device', $token, strtotime('+30 days'), '/', null, true, true, false, 'Strict')
                    );
                    return $response;
                }


                // Redirection finale (dashboard)
                return $this->redirectToRoute('app_main');
            }

            $this->addFlash('error', 'Code incorrect');
        }

        return $this->render('security/2fa_verify.html.twig');
    }
    #[Route('/2fa/setup', name: 'app_2fa_setup')]
    
    public function setup(TOTPService $totpService): Response
    {
        /** @var \App\Entity\Users $user */
        $user = $this->getUser();

        $qrCode = $totpService->getQRCode($user);

        return $this->render('security/setup_2fa.html.twig', [
            'qrCode' => $qrCode,
        ]);
    }
}
