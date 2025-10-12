<?php

namespace App\Tests\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tests fonctionnels pour UsersController
 *
 * - Simule un utilisateur admin connecté avec 2FA validée
 * - Vérifie la création, modification et suppression d’un utilisateur
 */
class UsersControllerTest extends WebTestCase
{
    private const USER_LIST_URL   = '/admin/utilisateurs/';
    private const USER_NEW_URL    = '/admin/utilisateurs/ajouter';
    private const USER_EDIT_URL   = '/admin/utilisateurs/%d/modifier';

    /**
     * Crée un client test et initialise la session
     */
    private function createClientWithSession(): \Symfony\Bundle\FrameworkBundle\KernelBrowser
    {
        $client = static::createClient(['environment' => 'test', 'debug' => true]);

        // Première requête GET pour initialiser la session
        $client->request('GET', '/');

        return $client;
    }

    /**
     * Connecte un utilisateur admin et valide la 2FA
     */
    private function loginAsAdmin($client): Users
    {
        $container = $client->getContainer()->get('test.service_container');
        $em = $container->get(EntityManagerInterface::class);
        $userRepo = $container->get(UsersRepository::class);

        // Création ou récupération de l’admin
        $admin = $userRepo->findOneBy(['email' => 'admin@example.com']);
        if (!$admin) {
            $admin = new Users();
            $admin->setEmail('admin@example.com')
                ->setNickname('Admin_' . uniqid())
                ->setPassword(password_hash('password123', PASSWORD_BCRYPT))
                ->setRoles(['ROLE_ADMIN'])
                ->setCreatedAt(new \DateTimeImmutable())
                ->setFirstname('Admin')
                ->setLastname('Admin');
            $em->persist($admin);
            $em->flush();
        }

        // Connexion du client
        $client->loginUser($admin);

        // Initialise la session et simule 2FA
        $client->request('GET', '/');
        $session = $client->getRequest()->getSession();
        $session->set('2fa_passed', true);
        $session->save();

        return $admin;
    }

    /**
     * Test de création d’un utilisateur via le formulaire
     */
    public function testUserFormValidSubmission(): void
    {
        $client = $this->createClientWithSession();
        $this->loginAsAdmin($client);

        $crawler = $client->request('GET', self::USER_NEW_URL);
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form[name="user_form"]');

        $nickname = 'jdoe_' . uniqid();
        $email = 'jdoe_' . uniqid() . '@example.com';

        $form = $crawler->selectButton('Enregistrer')->form([
            'user_form[lastname]'   => 'Doe',
            'user_form[firstname]'  => 'John',
            'user_form[nickname]'   => $nickname,
            'user_form[email]'      => $email,
            'user_form[password]'   => 'password123',
            'user_form[roles]'      => ['ROLE_ADMIN'],
            'user_form[address]'    => '123 Rue Exemple',
            'user_form[zipcode]'    => '75001',
            'user_form[city]'       => 'Paris',
            'user_form[country]'    => 'France',
        ]);

        $client->followRedirects(true);
        $client->submit($form);

        $this->assertStringContainsString(self::USER_LIST_URL, $client->getRequest()->getUri());

        // Vérification en base
        $userRepo = $client->getContainer()->get('test.service_container')->get(UsersRepository::class);
        $createdUser = $userRepo->findOneBy(['nickname' => $nickname]);
        $this->assertNotNull($createdUser);
        $this->assertSame($email, $createdUser->getEmail());
    }

    /**
     * Test de modification d’un utilisateur existant
     */
    public function testUserEdit(): void
    {
        $client = $this->createClientWithSession();
        $this->loginAsAdmin($client);

        $userRepo = $client->getContainer()->get('test.service_container')->get(UsersRepository::class);
        $user = $userRepo->findOneBy([], ['id' => 'DESC']);
        $this->assertNotNull($user);

        $userId = $user->getId();
        $newLastname = 'DoeModified_' . uniqid();

        $crawler = $client->request('GET', sprintf(self::USER_EDIT_URL, $userId));
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form[name="user_form"]');

        $form = $crawler->selectButton('Enregistrer')->form([
            'user_form[lastname]' => $newLastname,
            'user_form[roles]'    => ['ROLE_ADMIN'],
            'user_form[password]' => '', // pas de modification de mot de passe
        ]);

        $client->followRedirects(true);
        $client->submit($form);

        $this->assertStringContainsString(self::USER_LIST_URL, $client->getRequest()->getUri());

        $updatedUser = $userRepo->find($userId);
        $this->assertSame($newLastname, $updatedUser->getLastname());
    }

    /**
     * Test de suppression d’un utilisateur depuis le tableau
     */
    public function testUserDelete(): void
    {
        $client = $this->createClientWithSession();
        $this->loginAsAdmin($client);

        $container = $client->getContainer()->get('test.service_container');
        $em = $container->get(EntityManagerInterface::class);
        $userRepo = $container->get(UsersRepository::class);

        // Création d’un utilisateur temporaire
        $nickname = 'TempUser_' . uniqid();
        $email = 'temp_' . uniqid() . '@example.com';

        $user = new Users();
        $user->setNickname($nickname)
            ->setEmail($email)
            ->setPassword(password_hash('Password123', PASSWORD_BCRYPT))
            ->setRoles(['ROLE_ADMIN'])
            ->setCreatedAt(new \DateTimeImmutable())
            ->setFirstname('John')
            ->setLastname('Doe');

        $em->persist($user);
        $em->flush();

        $userId = $user->getId();
        $this->assertNotNull($userId, 'L’utilisateur temporaire doit avoir un ID.');

        // Accès à la page des utilisateurs et récupération du formulaire dans le tableau
        $crawler = $client->request('GET', self::USER_LIST_URL);
        $this->assertResponseIsSuccessful();

        // Utilisation de XPath pour pointer sur le formulaire spécifique
        $formNode = $crawler->filterXPath("//form[contains(@action, '/supprimer/$userId')]")->first();
        $this->assertGreaterThan(0, $formNode->count(), "Formulaire de suppression introuvable pour l’utilisateur ID $userId");

        $form = $formNode->form();

        // Soumission du formulaire avec suivi des redirections
        $client->followRedirects(true);
        $client->submit($form);

        // Vérification que l’utilisateur est bien supprimé
        $deletedUser = $userRepo->find($userId);
        $this->assertNull($deletedUser, 'L’utilisateur doit être supprimé de la base.');
    }
}
