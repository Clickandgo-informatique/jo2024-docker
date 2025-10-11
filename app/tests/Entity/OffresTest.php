<?php
// tests/Entity/OffresTest.php

namespace App\Tests\Entity;

use App\Entity\Offres;
use App\Entity\Images;
use App\Entity\DetailsCommandes;
use App\Entity\Sports;
use PHPUnit\Framework\TestCase;

/**
 * Test unitaire de l'entité Offres.
 * Vérifie les setters/getters, les collections et la cohérence des valeurs.
 */
final class OffresTest extends TestCase
{
    private Offres $offre;

    /**
     * Initialise une nouvelle instance avant chaque test
     */
    protected function setUp(): void
    {
        $this->offre = new Offres();
    }

    /**
     * Vérifie les setters et getters simples
     */
    public function testSettersAndGetters(): void
    {
        $this->offre->setIntitule('Test Offre')
            ->setPrix('25.50')
            ->setCode('CODE123')
            ->setDescription('Description test')
            ->setNbrAdultes(2)
            ->setNbrEnfants(1)
            ->setIsLocked(true)
            ->setIsPublished(true)
            ->setSlug('test-offre')
            ->setIsPromoted(true);

        $this->assertSame('Test Offre', $this->offre->getIntitule());
        $this->assertSame('25.50', $this->offre->getPrix());
        $this->assertSame('CODE123', $this->offre->getCode());
        $this->assertSame('Description test', $this->offre->getDescription());
        $this->assertSame(2, $this->offre->getNbrAdultes());
        $this->assertSame(1, $this->offre->getNbrEnfants());
        $this->assertTrue($this->offre->isLocked());
        $this->assertTrue($this->offre->isPublished());
        $this->assertSame('test-offre', $this->offre->getSlug());
        $this->assertTrue($this->offre->getIsPromoted());
    }

    /**
     * Vérifie que les collections d'images fonctionnent correctement
     */
    public function testImagesCollection(): void
    {
        $image = new Images();
        $this->offre->addImage($image);

        $this->assertCount(1, $this->offre->getImages());
        $this->assertSame($this->offre, $image->getOffres());

        $this->offre->removeImage($image);
        $this->assertCount(0, $this->offre->getImages());
        $this->assertNull($image->getOffres());
    }

    /**
     * Vérifie que les collections de détails de commande fonctionnent
     */
    public function testDetailsCommandesCollection(): void
    {
        $detail = new DetailsCommandes();
        $detail->setPrix(10)->setQuantite(2);

        $this->offre->addDetailsCommande($detail);
        $this->assertCount(1, $this->offre->getDetailsCommandes());
        $this->assertSame($this->offre, $detail->getOffres());

        $this->offre->removeDetailsCommande($detail);
        $this->assertCount(0, $this->offre->getDetailsCommandes());
        $this->assertNull($detail->getOffres());
    }

    /**
     * Vérifie que les collections de sports fonctionnent correctement
     */
    public function testSportsCollection(): void
    {
        $sport = new Sports();
        $this->offre->addSport($sport);

        $this->assertCount(1, $this->offre->getSports());
        $this->assertTrue($sport->getOffres()->contains($this->offre));

        $this->offre->removeSport($sport);
        $this->assertCount(0, $this->offre->getSports());
        $this->assertFalse($sport->getOffres()->contains($this->offre));
    }

    /**
     * Vérifie que les dates de début et de fin sont bien assignées
     */
    public function testDateDebutAndFin(): void
    {
        $debut = new \DateTime('2025-10-11');
        $fin = new \DateTime('2025-10-12');

        $this->offre->setDateDebut($debut)->setDateFin($fin);

        $this->assertSame($debut, $this->offre->getDateDebut());
        $this->assertSame($fin, $this->offre->getDateFin());
    }

    /**
     * Vérifie que les lieux peuvent être correctement assignés
     */
    public function testLieux(): void
    {
        $lieux = ['Paris', 'Lyon'];
        $this->offre->setLieux($lieux);
        $this->assertSame($lieux, $this->offre->getLieux());
    }

    /**
     * Vérifie l'image principale
     */
    public function testImage(): void
    {
        $this->offre->setImage('image.jpg');
        $this->assertSame('image.jpg', $this->offre->getImage());
    }
}
