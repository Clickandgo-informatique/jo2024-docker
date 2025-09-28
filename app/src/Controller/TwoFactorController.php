<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Service\TOTPService;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use App\Security\LoginFormAuthenticator;

class TwoFactorController extends AbstractController
{
    #[Route('/2fa', name: 'app_2fa_verify', methods: ['GET', 'POST'])]
    public function verify(
        Request $request,
        UsersRepository $userRepository,
        TOTPService $totpService,
        EntityManagerInterface $em,
        UserAuthenticatorInterface $userAuthenticator,
        LoginFormAuthenticator $authenticator
    ): Response {
        $session = $request->getSession();
        $userId = $session->get('2fa:userId');

        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }

        /** @var Users $user */
        $user = $userRepository->find($userId);

        if (!$user) {
            $session->remove('2fa:userId');
            return $this->redirectToRoute('app_login');
        }

        $qrCode = null;
        if ($user->getGoogle2FASecret()) {
            $qrCode = $totpService->getQRCode($user);
        }

        if ($request->isMethod('POST')) {
            $code = $request->request->get('code');

            if ($totpService->verifyCode($user, $code)) {
                // ✅ 2FA validé pour cette session
                $session->set('2fa_verified', true);
                $session->remove('2fa:userId');

                $response = $userAuthenticator->authenticateUser(
                    $user,
                    $authenticator,
                    $request
                );

                if ($request->request->get('remember_device')) {
                    $token = bin2hex(random_bytes(32));
                    $user->setTrustedToken($token);
                    $em->persist($user);
                    $em->flush();

                    $response->headers->setCookie(
                        new Cookie('trusted_device', $token, strtotime('+30 days'), '/', null, true, true, false, 'Strict')
                    );
                }

                return in_array('ROLE_ADMIN', $user->getRoles(), true)
                    ? $this->redirectToRoute('app_admin_index')
                    : $this->redirectToRoute('app_main');
            }

            $this->addFlash('error', 'Code incorrect ❌');
        }

        return $this->render('security/2fa_verify.html.twig', [
            'user' => $user,
            'qrCode' => $qrCode,
        ]);
    }
}
