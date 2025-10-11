<?php
// tests/Entity/CommandeOffresIntegrationTest.php

namespace App\Tests\Entity;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Entity\Offres;
use PHPUnit\Framework\TestCase;

/**
 * Test combiné Commandes + DetailsCommandes + Offres
 * Vérifie le calcul du total de la commande avec des offres réelles.
 */
final class CommandeOffresIntegrationTest extends TestCase
{
    private Commandes $commande;

    protected function setUp(): void
    {
        $this->commande = new Commandes();
    }

    /**
     * Vérifie le calcul du total pour une commande contenant plusieurs détails et offres
     */
    public function testTotalCommandeWithOffres(): void
    {
        // Création des offres
        $offre1 = new Offres();
        $offre1->setIntitule('Offre A')->setPrix('15.50');

        $offre2 = new Offres();
        $offre2->setIntitule('Offre B')->setPrix('5.00');

        // Création des détails de commande
        $detail1 = new DetailsCommandes();
        $detail1->setOffres($offre1)
            ->setPrix((float)$offre1->getPrix())
            ->setQuantite(2);

        $detail2 = new DetailsCommandes();
        $detail2->setOffres($offre2)
            ->setPrix((float)$offre2->getPrix())
            ->setQuantite(3);

        // Ajout des détails à la commande
        $this->commande->addDetailsCommande($detail1);
        $this->commande->addDetailsCommande($detail2);

        // Calcul attendu
        $expectedTotal = (15.50 * 2) + (5.00 * 3); // 31 + 15 = 46

        $this->assertEquals($expectedTotal, $this->commande->getTotalCommande());
    }

    /**
     * Vérifie que les détails sont correctement associés à la commande
     */
    public function testDetailsAreLinkedToCommande(): void
    {
        $offre = new Offres();
        $offre->setIntitule('Offre Test')->setPrix('10');

        $detail = new DetailsCommandes();
        $detail->setOffres($offre)->setPrix(10)->setQuantite(1);

        $this->commande->addDetailsCommande($detail);

        $this->assertCount(1, $this->commande->getDetailsCommandes());
        $this->assertSame($this->commande, $detail->getCommande());
        $this->assertSame($offre, $detail->getOffres());
    }
}
