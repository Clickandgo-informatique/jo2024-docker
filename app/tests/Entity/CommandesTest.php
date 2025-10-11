<?php
// tests/Entity/CommandesTest.php

namespace App\Tests\Entity;

use App\Entity\Commandes;
use App\Entity\Users;
use App\Entity\DetailsCommandes;
use App\Entity\Tickets;
use PHPUnit\Framework\TestCase;

/**
 * Classe de test unitaire pour l'entité Commandes.
 * 
 * Vérifie la cohérence des setters/getters, des relations Doctrine
 * et du calcul du total de la commande.
 */
final class CommandesTest extends TestCase
{
    private Commandes $commande;

    /**
     * Méthode exécutée avant chaque test.
     * Initialise une nouvelle instance de Commandes.
     */
    protected function setUp(): void
    {
        $this->commande = new Commandes();
    }

    /**
     * Vérifie que la référence peut être définie et récupérée correctement.
     */
    public function testReference(): void
    {
        $this->commande->setReference('CMD123');
        $this->assertSame('CMD123', $this->commande->getReference());
    }

    /**
     * Vérifie que la date de création est automatiquement définie
     * lors de l'instanciation de l'entité.
     */
    public function testCreatedAtIsSetByDefault(): void
    {
        $this->assertInstanceOf(\DateTimeImmutable::class, $this->commande->getCreatedAt());
    }

    /**
     * Vérifie l'association d'un utilisateur à une commande.
     */
    public function testUserAssociation(): void
    {
        $user = new Users();
        $this->commande->setUser($user);
        $this->assertSame($user, $this->commande->getUser());
    }

    /**
     * Vérifie que l'ajout et la suppression de détails de commande
     * fonctionnent correctement et que la relation bidirectionnelle
     * entre Commandes et DetailsCommandes est respectée.
     */
    public function testAddAndRemoveDetailsCommande(): void
    {
        $detail = new DetailsCommandes();
        $detail->setPrix(10.0);
        $detail->setQuantite(2);

        // Ajout du détail à la commande
        $this->commande->addDetailsCommande($detail);
        $this->assertCount(1, $this->commande->getDetailsCommandes());
        $this->assertSame($this->commande, $detail->getCommande());

        // Suppression du détail
        $this->commande->removeDetailsCommande($detail);
        $this->assertCount(0, $this->commande->getDetailsCommandes());
        $this->assertNull($detail->getCommande());
    }

    /**
     * Vérifie l'association d'un ticket à une commande
     * et la synchronisation de la relation inverse.
     */
    public function testTicketAssociation(): void
    {
        $ticket = new Tickets();
        $this->commande->setTicket($ticket);
        $this->assertSame($ticket, $this->commande->getTicket());
        $this->assertSame($this->commande, $ticket->getCommande());
    }

    /**
     * Vérifie que le QR token est bien généré automatiquement
     * lors de la création de l'entité.
     */
    public function testQrTokenIsGeneratedByDefault(): void
    {
        $token = $this->commande->getQrToken();
        $this->assertNotEmpty($token);
        $this->assertGreaterThanOrEqual(32, strlen($token)); // bin2hex(random_bytes(16)) = 32 caractères
    }

    /**
     * Vérifie le fonctionnement des setters/getters pour la date de paiement.
     */
    public function testPayeeLeSetterGetter(): void
    {
        $date = new \DateTimeImmutable('2025-10-11');
        $this->commande->setPayeeLe($date);
        $this->assertSame($date, $this->commande->getPayeeLe());
    }

    /**
     * Vérifie le fonctionnement des setters/getters pour la date de scan.
     */
    public function testDateScanSetterGetter(): void
    {
        $date = new \DateTimeImmutable('2025-10-11 12:00:00');
        $this->commande->setDateScan($date);
        $this->assertSame($date, $this->commande->getDateScan());
    }

    /**
     * Vérifie le lien entre la commande et l'utilisateur ayant scanné le ticket.
     */
    public function testScannedBySetterGetter(): void
    {
        $user = new Users();
        $this->commande->setScannedBy($user);
        $this->assertSame($user, $this->commande->getScannedBy());
    }

    /**
     * Vérifie que le total de la commande est correctement calculé
     * à partir du prix et de la quantité de chaque détail de commande.
     */
    public function testGetTotalCommande(): void
    {
        $detail1 = new DetailsCommandes();
        $detail1->setPrix(15.5)->setQuantite(2);

        $detail2 = new DetailsCommandes();
        $detail2->setPrix(5)->setQuantite(3);

        $this->commande->addDetailsCommande($detail1);
        $this->commande->addDetailsCommande($detail2);

        $expectedTotal = (15.5 * 2) + (5 * 3); // 31 + 15 = 46
        $this->assertEquals($expectedTotal, $this->commande->getTotalCommande());
    }
}
