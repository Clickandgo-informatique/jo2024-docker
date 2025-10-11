<?php

namespace App\Tests\Entity;

use App\Entity\CategoriesOffres;
use App\Entity\Offres;
use PHPUnit\Framework\TestCase;

/**
 * Tests unitaires pour l'entité CategoriesOffres
 */
class CategoriesOffresTest extends TestCase
{
    /**
     * Test de l'instanciation et des valeurs par défaut
     */
    public function testDefaultValues(): void
    {
        $categorie = new CategoriesOffres();

        // L'id doit être null par défaut
        $this->assertNull($categorie->getId());

        // Le champ isTest doit être false par défaut
        $this->assertFalse($categorie->isTest());

        // La collection d'offres doit être vide
        $this->assertCount(0, $categorie->getOffres());
    }

    /**
     * Test des getters et setters simples
     */
    public function testGettersAndSetters(): void
    {
        $categorie = new CategoriesOffres();

        $categorie->setNom('Catégorie Test');
        $categorie->setSlug('categorie-test');
        $categorie->setIcone('icone.png');
        $categorie->setDescription('Description de test');
        $categorie->setIsTest(true);

        $this->assertSame('Catégorie Test', $categorie->getNom());
        $this->assertSame('categorie-test', $categorie->getSlug());
        $this->assertSame('icone.png', $categorie->getIcone());
        $this->assertSame('Description de test', $categorie->getDescription());
        $this->assertTrue($categorie->isTest());
    }

    /**
     * Test de l'ajout et de la suppression d'une offre
     */
    public function testAddAndRemoveOffre(): void
    {
        $categorie = new CategoriesOffres();
        $offre = new Offres();

        // L'ajout doit remplir la collection
        $categorie->addOffre($offre);
        $this->assertCount(1, $categorie->getOffres());
        $this->assertSame($categorie, $offre->getCategorie());

        // L'ajout multiple ne doit pas dupliquer
        $categorie->addOffre($offre);
        $this->assertCount(1, $categorie->getOffres());

        // La suppression doit retirer l'élément et détacher la relation
        $categorie->removeOffre($offre);
        $this->assertCount(0, $categorie->getOffres());
        $this->assertNull($offre->getCategorie());
    }

    /**
     * Test de l'unicité simulée du nom
     * 
     * Ici, on ne peut pas tester la contrainte UniqueEntity directement,
     * mais on peut vérifier la valeur du champ.
     */
    public function testUniqueNameSimulation(): void
    {
        $categorie1 = new CategoriesOffres();
        $categorie2 = new CategoriesOffres();

        $categorie1->setNom('NomUnique');
        $categorie2->setNom('NomUnique');

        $this->assertSame('NomUnique', $categorie1->getNom());
        $this->assertSame('NomUnique', $categorie2->getNom());
    }
}
