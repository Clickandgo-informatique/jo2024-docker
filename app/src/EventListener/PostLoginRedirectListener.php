<?php

namespace App\EventListener;

use App\Entity\Users;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class PostLoginRedirectListener
{
    private RouterInterface $router;
    private TokenStorageInterface $tokenStorage;

    public function __construct(RouterInterface $router, TokenStorageInterface $tokenStorage)
    {
        $this->router = $router;
        $this->tokenStorage = $tokenStorage;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $token = $this->tokenStorage->getToken();

        if (!$token) {
            return;
        }

        $user = $token->getUser();
        if (!$user || !method_exists($user, 'getRoles')) {
            return;
        }

        $session = $request->getSession();
        if (!$session) {
            return;
        }

        // ✅ Si l'utilisateur a activé la 2FA dans son compte, marque la session
        // uniquement si elle n'est pas déjà validée pour cette session

        $user = $token->getUser();
        if (!$user instanceof Users) {
            return; // on ne fait rien si ce n'est pas un utilisateur de notre entité
        }

        if ($user->is2FAEnabled() && !$session->has('2fa_verified')) {
            $session->set('2fa_verified', false); // par défaut non validée
        }

        // 🔹 Redirection des admins vers le dashboard admin après login
        // uniquement si la route visitée est app_main
        if ($request->get('_route') === 'app_main' && in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            $response = new RedirectResponse($this->router->generate('admin_dashboard'));
            $event->setResponse($response);
        }
    }
}
