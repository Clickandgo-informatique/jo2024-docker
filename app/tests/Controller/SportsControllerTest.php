<?php

namespace App\Tests\Controller;

use App\Entity\Sports;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SportsControllerTest extends WebTestCase
{
    private $client;
    private $em;
    private $admin;

    protected function setUp(): void
    {
        $this->client = static::createClient([
            'environment' => 'test',
            'debug' => true,
        ]);

        $container = static::getContainer();
        $this->em = $container->get('doctrine')->getManager();

        // Récupère un utilisateur admin existant
        $userRepo = $container->get(\App\Repository\UsersRepository::class);
        $this->admin = $userRepo->findOneBy(['email' => 'admin@example.com']);

        // Login admin
        $this->client->loginUser($this->admin);

        // Simule la 2FA passée
        $session = $this->client->getContainer()->get('session');
        $session->set('2fa_passed', true);
        $session->save();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', '/admin/sports');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorExists('h1');
        $this->assertSelectorTextContains('h1', 'Liste des sports');
    }

    public function testCreateNewSport(): void
    {
        $crawler = $this->client->request('GET', '/admin/sports/ajout');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');

        $formData = [
            'sports_form[intitule]' => 'Test Sport',
            'sports_form[background_color]' => '#ff0000',
            'sports_form[icone]' => '🏀',
            'sports_form[emoji]' => '🏀',
            'sports_form[pictogramme]' => '<svg></svg>',
            'sports_form[slug]' => 'test-sport',
        ];

        $this->client->submitForm('Enregistrer', $formData);

        $this->assertResponseRedirects('/admin/sports');
        $this->client->followRedirect();

        $this->assertSelectorTextContains('body', 'Test Sport');

        $sport = $this->em->getRepository(Sports::class)->findOneBy(['slug' => 'test-sport']);
        $this->assertNotNull($sport);
        $this->assertSame('🏀', $sport->getEmoji());
    }

    public function testEditSport(): void
    {
        // Création d'un sport à modifier
        $sport = new Sports();
        $sport->setIntitule('Sport à modifier');
        $sport->setSlug('sport-modif');
        $this->em->persist($sport);
        $this->em->flush();

        $crawler = $this->client->request('GET', '/admin/sports/' . $sport->getId() . '/edit');
        $this->assertResponseIsSuccessful();

        $this->client->submitForm('Enregistrer', [
            'sports_form[intitule]' => 'Sport modifié',
            'sports_form[slug]' => 'sport-modifie',
        ]);

        $this->assertResponseRedirects('/admin/sports');
        $this->client->followRedirect();

        $this->assertSelectorTextContains('body', 'Sport modifié');
    }

    public function testDeleteSport(): void
    {
        $sport = new Sports();
        $sport->setIntitule('Sport à supprimer');
        $sport->setSlug('sport-suppression');
        $this->em->persist($sport);
        $this->em->flush();

        // Récupération du token CSRF
        $csrfToken = static::getContainer()
            ->get('security.csrf.token_manager')
            ->getToken('delete' . $sport->getId());

        $this->client->request('POST', '/admin/sports/' . $sport->getId(), [
            '_token' => $csrfToken,
        ]);

        $this->assertResponseRedirects('/admin/sports');
        $this->client->followRedirect();

        $deleted = $this->em->getRepository(Sports::class)->find($sport->getId());
        $this->assertNull($deleted);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->em->close();
        $this->em = null;
    }
}
