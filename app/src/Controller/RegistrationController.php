<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Repository\UsersRepository;
use App\Service\JWTService;
use App\Service\SendEmailService;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        JWTService $jwt,
        SendEmailService $mailer
    ): Response {
        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
            $user->setCreatedAt(new DateTimeImmutable());

            $entityManager->persist($user);
            $entityManager->flush();

            // Générer le token
            $header = ['typ' => 'JWT', 'alg' => 'HS256'];
            $payload = ['user_id' => $user->getId()];
            $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'), 10800);

            // Envoyer le mail de confirmation
            $mailer->send(
                'no-reply-reservations-jo2024@clickandgo-informatique.com',
                $user->getEmail(),
                'Activation de votre compte',
                'register-confirmation',
                compact('token', 'user')
            );

            $this->addFlash(
                'success',
                'Utilisateur inscrit ! Un email d\'activation vous a été envoyé par mail, vérifiez vos spams si vous ne le voyez pas.'
            );

            // 🔑 Pas de login automatique → redirection vers login
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    #[Route('/verif/{token}', name: 'verify_user')]
    public function verifUser(
        string $token,
        JWTService $jwt,
        UsersRepository $usersRepository,
        EntityManagerInterface $em,
        Security $security
    ): Response {
        if ($jwt->isValid($token) && !$jwt->isExpired($token) && $jwt->check($token, $this->getParameter('app.jwtsecret'))) {
            $payload = $jwt->getPayload($token);
            $user = $usersRepository->find($payload['user_id']);

            if ($user && !$user->isVerified()) {
                $user->setIsVerified(true);

                // ✅ Génération de la clé de compte unique lors de l’activation avec contrôle d'unicité
                if (!$user->getAccountKey()) {
                    do {
                        $key = bin2hex(random_bytes(32)); // 64 caractères hexadécimaux
                    } while ($usersRepository->findOneBy(['accountKey' => $key]));

                    $user->setAccountKey($key);
                }

                $em->flush();

                $this->addFlash('success', 'Votre compte a été activé avec succès.');

                // 🔑 Connexion automatique après activation
                return $security->login($user, authenticatorName: null, firewallName: 'main');
            }
        }

        $this->addFlash('danger', 'Le token est invalide ou a expiré');
        return $this->redirectToRoute('app_login');
    }
}
