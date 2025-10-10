<?php

namespace App\Tests\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Tests fonctionnels pour UsersController
 */
class UsersControllerTest extends WebTestCase
{
    private const USER_LIST_URL   = '/admin/utilisateurs/';
    private const USER_NEW_URL    = '/admin/utilisateurs/ajouter';
    private const USER_EDIT_URL   = '/admin/utilisateurs/%d/modifier';
    private const USER_DELETE_URL = '/admin/utilisateurs/%d/supprimer';

    protected static function getKernelClass(): string
    {
        return \App\Kernel::class;
    }

    // Connecte un utilisateur admin pour les tests
    private function loginAsAdmin($client): void
    {
        $container = $client->getContainer();
        $userRepo = $container->get(UsersRepository::class);
        $em = $container->get(EntityManagerInterface::class);

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

        $client->loginUser($admin);
    }

    // Retourne l'ID du dernier utilisateur
    private function getLastUserId($client): int
    {
        $container = $client->getContainer();
        $repo = $container->get(UsersRepository::class);
        $user = $repo->findOneBy([], ['id' => 'DESC']);
        return $user ? $user->getId() : 0;
    }

    public function testUserFormValidSubmission(): void
    {
        $client = static::createClient();
        $this->loginAsAdmin($client);

        $crawler = $client->request('GET', self::USER_NEW_URL);
        $this->assertResponseIsSuccessful();

        $nickname = 'jdoe_' . uniqid();
        $email = 'jdoe_' . uniqid() . '@example.com';

        // Formulaire complet avec tous les rôles disponibles
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

        $client->submit($form);

        $this->assertResponseRedirects(self::USER_LIST_URL);

        $client->followRedirect();
        $this->assertSelectorTextContains('table', $nickname);
    }

    public function testUserEdit(): void
    {
        $client = static::createClient();
        $this->loginAsAdmin($client);

        $lastId = $this->getLastUserId($client);
        $this->assertNotSame(0, $lastId, 'Aucun utilisateur trouvé');

        $container = $client->getContainer();
        $repo = $container->get(UsersRepository::class);
        $utilisateur = $repo->find($lastId);

        $crawler = $client->request('GET', sprintf(self::USER_EDIT_URL, $lastId));
        $this->assertResponseIsSuccessful();

        $form = $crawler->selectButton('Enregistrer')->form([
            'user_form[lastname]' => 'DoeModified_' . uniqid(),
            'user_form[roles]'    => ['ROLE_ADMIN'],
        ]);

        $client->submit($form);

        $this->assertResponseRedirects(self::USER_LIST_URL);
        $client->followRedirect();
        $this->assertSelectorTextContains('table', 'DoeModified_');

        $updatedUser = $repo->find($lastId);
        $this->assertStringContainsString('DoeModified_', $updatedUser->getLastname());
    }

    public function testUserDelete(): void
    {
        $client = static::createClient();
        $this->loginAsAdmin($client);

        $container = $client->getContainer();
        $em = $container->get(EntityManagerInterface::class);
        $userRepo = $container->get(UsersRepository::class);

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
        $this->assertNotNull($userId, 'L’utilisateur temporaire doit être créé.');

        // Requête GET pour initialiser la session
        $client->request('GET', '/admin/utilisateurs/');

        $csrfToken = $container->get('security.csrf.token_manager')
            ->getToken('delete-user' . $userId);

        $client->request('POST', sprintf(self::USER_DELETE_URL, $userId), [
            '_token' => $csrfToken->getValue(),
        ]);

        $this->assertResponseRedirects(self::USER_LIST_URL);
        $client->followRedirect();
        $this->assertSelectorTextNotContains('table', $nickname);

        $deletedUser = $userRepo->find($userId);
        $this->assertNull($deletedUser);
    }
}
