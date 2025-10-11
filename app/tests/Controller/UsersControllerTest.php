<?php

namespace App\Tests\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * ✅ Tests fonctionnels pour UsersController
 *
 * Ce test :
 * - Simule un utilisateur admin connecté avec 2FA validée
 * - Initialise la session pour les jetons CSRF
 * - Vérifie la création, modification et suppression d’un utilisateur
 */
class UsersControllerTest extends WebTestCase
{
    private const USER_LIST_URL   = '/admin/utilisateurs/';
    private const USER_NEW_URL    = '/admin/utilisateurs/ajouter';
    private const USER_EDIT_URL   = '/admin/utilisateurs/%d/modifier';
    private const USER_DELETE_URL = '/admin/utilisateurs/%d/supprimer';

    /**
     * Retourne la classe du kernel Symfony
     */
    protected static function getKernelClass(): string
    {
        return \App\Kernel::class;
    }

    /**
     * 🔐 Connecte un utilisateur admin et simule la validation de la 2FA
     */
    private function loginAsAdmin($client): void
    {
        $container = $client->getContainer();
        $testContainer = $container->get('test.service_container');

        // Récupération du repository et de l'EntityManager
        $userRepo = $testContainer->get(UsersRepository::class);
        $em = $testContainer->get(EntityManagerInterface::class);

        // Création de l'utilisateur admin si inexistant
        $admin = $userRepo->findOneBy(['email' => 'admin@example.com']);
        if (!$admin) {
            $admin = new Users();
            $admin->setEmail('admin@example.com')
                ->setNickname('Admin_' . uniqid())
                ->setPassword(password_hash('password123', PASSWORD_BCRYPT))
                ->setRoles(['ROLE_ADMIN'])
                ->setCreatedAt(new \DateTimeImmutable());

            $em->persist($admin);
            $em->flush();
        }

        // Connexion du client avec l'utilisateur
        $client->loginUser($admin);

        // ⚠️ Important : effectuer une requête pour initialiser la session
        $client->request('GET', '/');

        // Accès à la session via la requête du client
        $session = $client->getRequest()->getSession();
        $session->set('2fa_passed', true);
        $session->save();
    }

    /**
     * 🔍 Retourne l’ID du dernier utilisateur créé
     */
    private function getLastUserId($client): int
    {
        $repo = $client->getContainer()->get('test.service_container')->get(UsersRepository::class);
        $user = $repo->findOneBy([], ['id' => 'DESC']);
        return $user ? $user->getId() : 0;
    }

    /**
     * ✅ Test de création d’un utilisateur via le formulaire
     */
    public function testUserFormValidSubmission(): void
    {
        $client = static::createClient(['environment' => 'test']);
        $this->loginAsAdmin($client);

        // Accès au formulaire de création
        $crawler = $client->request('GET', self::USER_NEW_URL);
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form[name="user_form"]');

        // Préparation des données du formulaire
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

        // Soumission du formulaire avec suivi de redirection
        $client->followRedirects(true);
        $client->submit($form);

        // Vérifie que la redirection a bien eu lieu vers la liste des utilisateurs
        $this->assertStringContainsString(self::USER_LIST_URL, $client->getRequest()->getUri());

        // Vérifie que l’utilisateur a bien été créé en base
        $userRepo = $client->getContainer()->get('test.service_container')->get(UsersRepository::class);
        $createdUser = $userRepo->findOneBy(['nickname' => $nickname]);

        $this->assertNotNull($createdUser, 'L’utilisateur doit exister en base.');
        $this->assertSame($email, $createdUser->getEmail());
    }


    /**
     * ✏️ Test de modification d’un utilisateur existant
     */
    public function testUserEdit(): void
    {
        $client = static::createClient(['environment' => 'test']);
        $this->loginAsAdmin($client);

        // Récupération du dernier utilisateur existant
        $userRepo = $client->getContainer()->get('test.service_container')->get(UsersRepository::class);
        $user = $userRepo->findOneBy([], ['id' => 'DESC']);
        $this->assertNotNull($user, 'Aucun utilisateur trouvé pour modification');

        $userId = $user->getId();
        $newLastname = 'DoeModified_' . uniqid();

        // Accès au formulaire d’édition
        $crawler = $client->request('GET', sprintf(self::USER_EDIT_URL, $userId));
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form[name="user_form"]');

        // Préparation et soumission du formulaire
        $form = $crawler->selectButton('Enregistrer')->form([
            'user_form[lastname]' => $newLastname,
            'user_form[roles]'    => ['ROLE_ADMIN'],
            'user_form[password]' => '', // pas de changement de mot de passe
        ]);

        $client->followRedirects(true);
        $client->submit($form);

        // Vérifie que la redirection a bien eu lieu vers la liste des utilisateurs
        $this->assertStringContainsString(self::USER_LIST_URL, $client->getRequest()->getUri());

        // Vérifie que la modification a bien été enregistrée en base
        $updatedUser = $userRepo->find($userId);
        $this->assertNotNull($updatedUser);
        $this->assertSame($newLastname, $updatedUser->getLastname());
    }

    /**
     * 🗑️ Test de suppression d’un utilisateur
     */
    public function testUserDelete(): void
    {
        // Création du client de test en environnement "test"
        $client = static::createClient(['environment' => 'test']);

        // Connexion simulée avec un utilisateur admin et validation 2FA
        $this->loginAsAdmin($client);

        // Accès aux services nécessaires via le conteneur de test
        $container = $client->getContainer();
        $testContainer = $container->get('test.service_container');
        $em = $testContainer->get(EntityManagerInterface::class);
        $userRepo = $testContainer->get(UsersRepository::class);

        // Création d’un utilisateur temporaire à supprimer
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

        // Récupération de l’ID de l’utilisateur créé
        $userId = $user->getId();
        $this->assertNotNull($userId);

        // Récupération du formulaire de suppression réel depuis le DOM
        $form = $this->findDeleteFormForUser($client, $userId);

        // Activation du suivi de redirection pour capturer la redirection après suppression
        $client->followRedirects(true);

        // Soumission du formulaire de suppression
        $client->submit($form);

        // Vérifie que la redirection a bien eu lieu vers la liste des utilisateurs
        $this->assertStringContainsString(self::USER_LIST_URL, $client->getRequest()->getUri());

        // Vérifie que l’utilisateur a bien été supprimé en base
        $deletedUser = $userRepo->find($userId);
        $this->assertNull($deletedUser);
    }
    /**
     * 🔍 Récupère le formulaire de suppression pour un utilisateur donné
     */
    private function findDeleteFormForUser(\Symfony\Bundle\FrameworkBundle\KernelBrowser $client, int $userId): \Symfony\Component\DomCrawler\Form
    {
        // Accès à la page listant les utilisateurs
        $crawler = $client->request('GET', self::USER_LIST_URL);
        $this->assertResponseIsSuccessful();

        // Sélectionne tous les formulaires de suppression
        $formNodes = $crawler->filter('form[action*="/supprimer"]');

        // Parcours des nœuds via l’API Crawler
        foreach ($formNodes as $index => $unused) {
            $formCrawler = $formNodes->eq($index);
            $action = $formCrawler->attr('action');

            if (str_contains($action, (string) $userId)) {
                return $formCrawler->form();
            }
        }

        // Si aucun formulaire trouvé, échec explicite
        $this->fail("Formulaire de suppression introuvable pour l’utilisateur ID $userId.");
    }
}
