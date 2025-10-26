<?php
// LoginFormAuthenticator.php

namespace App\Security;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    private RouterInterface $router;
    private EntityManagerInterface $em;

    public function __construct(RouterInterface $router, EntityManagerInterface $em)
    {
        $this->router = $router;
        $this->em = $em;
    }

    public function authenticate(Request $request): Passport
    {
        $nickname = $request->request->get('nickname', '');
        $password = $request->request->get('password', '');

        return new Passport(
            new UserBadge($nickname, function ($userIdentifier) {
                $user = $this->em->getRepository(Users::class)->findOneBy(['nickname' => $userIdentifier]);
                if (!$user) {
                    // Message personnalisé si utilisateur non trouvé
                    throw new CustomUserMessageAuthenticationException('Adresse e-mail ou mot de passe incorrect, veuillez vérifier les deux champs.');
                }
                return $user;
            }),
            new PasswordCredentials($password)
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): RedirectResponse
    {
        /** @var Users $user */
        $user = $token->getUser();

        // Si pas encore de secret 2FA → on le génère
        if (!$user->getGoogle2FASecret()) {
            $google2FA = new \PragmaRX\Google2FA\Google2FA();
            $secret = $google2FA->generateSecretKey();
            $user->setGoogle2FASecret($secret);
            $user->setIs2FAEnabled(false);

            $this->em->persist($user);
            $this->em->flush();
        }

        // Si l’utilisateur n’a pas encore validé son 2FA → setup obligatoire
        if (!$user->is2FAEnabled()) {
            return new RedirectResponse($this->router->generate('app_2fa_setup'));
        }

        // Sinon, passage obligatoire par la vérification OTP
        $request->getSession()->set('2fa:userId', $user->getId());
        return new RedirectResponse($this->router->generate('2fa_verify'));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->router->generate('app_login');
    }
}
