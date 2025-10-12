<?php

namespace App\Tests\Controller;

use App\Entity\CategoriesOffres;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tests fonctionnels complets du CRUD CategoriesOffres
 * - Index
 * - New
 * - Edit
 * - Delete
 */
class CategoriesOffresControllerTest extends WebTestCase
{
    public function testIndexPageIsAccessible(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/categories-offres/');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorExists('h1', 'Liste des catégories');
    }

    public function testCreateNewCategory(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/categories-offres/ajout');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorExists('form');

        // Soumission du formulaire
        $client->submitForm('Enregistrer', [
            'categories_offres[intitule]' => 'Catégorie Test',
            'categories_offres[slug]' => 'categorie-test',
            'categories_offres[description]' => 'Une catégorie de test',
        ]);

        // Vérifie la redirection
        $this->assertResponseRedirects('/admin/categories-offres/');

        // Suivre la redirection
        $client->followRedirect();

        // Vérifie que la nouvelle catégorie apparaît dans la liste
        $this->assertSelectorTextContains('body', 'Catégorie Test');
    }

    public function testEditExistingCategory(): void
    {
        $client = static::createClient();
        $container = static::getContainer();
        $em = $container->get('doctrine')->getManager();

        // Création d'une catégorie avant le test
        $cat = new CategoriesOffres();
        $cat->setNom('Catégorie à modifier');
        $cat->setSlug('categorie-modif');
        $cat->setDescription('Ancienne description');
        $em->persist($cat);
        $em->flush();

        // Page d'édition
        $crawler = $client->request('GET', '/admin/categories-offres/' . $cat->getId() . '/modifier');
        $this->assertResponseIsSuccessful();

        $client->submitForm('Mettre à jour', [
            'categories_offres[intitule]' => 'Catégorie modifiée',
            'categories_offres[description]' => 'Nouvelle description',
        ]);

        $this->assertResponseRedirects('/admin/categories-offres/');
        $client->followRedirect();

        // Vérifie la modification
        $this->assertSelectorTextContains('body', 'Catégorie modifiée');
    }

    public function testDeleteCategory(): void
    {
        $client = static::createClient();
        $container = static::getContainer();
        $em = $container->get('doctrine')->getManager();

        $cat = new CategoriesOffres();
        $cat->setNom('Catégorie à supprimer');
        $cat->setSlug('categorie-suppression');
        $em->persist($cat);
        $em->flush();

        // Accès à la page d'index
        $crawler = $client->request('GET', '/admin/categories-offres/');
        $this->assertResponseIsSuccessful();

        // Simulation du formulaire de suppression (CSRF token)
        $client->submitForm('Supprimer');

        $this->assertResponseRedirects('/admin/categories-offres/');
        $client->followRedirect();

        // Vérifie que la catégorie n'existe plus en base
        $deleted = $em->getRepository(CategoriesOffres::class)->find($cat->getId());
        $this->assertNull($deleted, 'La catégorie doit être supprimée de la base.');
    }
}
