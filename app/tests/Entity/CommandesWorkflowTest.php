<?php
// tests/Entity/CommandesWorkflowTest.php

namespace App\Tests\Entity;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Entity\Offres;
use App\Entity\Tickets;
use App\Entity\Users;
use PHPUnit\Framework\TestCase;

/**
 * Test intégré simulant une commande complète avec offres et ticket
 */
final class CommandesWorkflowTest extends TestCase
{
    private Commandes $commande;
    private Users $user;

    protected function setUp(): void
    {
        $this->user = new Users();
        $this->commande = new Commandes();
        $this->commande->setUser($this->user);
    }

    /**
     * Vérifie l'ajout d'offres et le calcul du total
     */
    public function testCommandeWithDetailsAndTotal(): void
    {
        // Création des offres
        $offre1 = new Offres();
        $offre1->setIntitule('Offre A')->setPrix('12.50');

        $offre2 = new Offres();
        $offre2->setIntitule('Offre B')->setPrix('7.00');

        // Création des détails de commande
        $detail1 = new DetailsCommandes();
        $detail1->setOffres($offre1)->setPrix((float)$offre1->getPrix())->setQuantite(3); // 37.50

        $detail2 = new DetailsCommandes();
        $detail2->setOffres($offre2)->setPrix((float)$offre2->getPrix())->setQuantite(2); // 14.00

        // Ajout des détails à la commande
        $this->commande->addDetailsCommande($detail1);
        $this->commande->addDetailsCommande($detail2);

        // Vérification du total
        $expectedTotal = (12.50 * 3) + (7.00 * 2); // 37.50 + 14.00 = 51.50
        $this->assertEquals($expectedTotal, $this->commande->getTotalCommande());
    }

    /**
     * Vérifie la création et l'association d'un ticket à la commande
     */
    public function testTicketAssociation(): void
    {
        $ticket = new Tickets();
        $ticketKey = bin2hex(random_bytes(32));
        $ticket->setTicketKey($ticketKey);
        $ticket->setCommande($this->commande);
        $ticket->setUser($this->user);
        $ticket->computeAndSetPayloadHashFromAccountKey('account_secret');

        // Lier le ticket à la commande
        $this->commande->setTicket($ticket);

        $this->assertSame($ticket, $this->commande->getTicket());
        $this->assertSame($this->commande, $ticket->getCommande());
        $this->assertSame($this->user, $ticket->getUser());
        $this->assertNotNull($ticket->getPayloadHash());
        $this->assertEquals(64, strlen($ticket->getPayloadHash()));
    }

    /**
     * Vérifie l'état du ticket après utilisation
     */
    public function testTicketUsage(): void
    {
        $ticket = new Tickets();
        $ticket->setTicketKey(bin2hex(random_bytes(32)));
        $ticket->setCommande($this->commande);

        $usedAt = new \DateTimeImmutable('2025-10-11 12:00:00');
        $ticket->setIsUsed(true);
        $ticket->setUsedAt($usedAt);

        $this->assertTrue($ticket->isUsed());
        $this->assertSame($usedAt, $ticket->getUsedAt());
    }

    /**
     * Vérifie que les détails de commande sont correctement liés à la commande
     */
    public function testDetailsLinkedToCommande(): void
    {
        $offre = new Offres();
        $offre->setIntitule('Offre Test')->setPrix('5');

        $detail = new DetailsCommandes();
        $detail->setOffres($offre)->setPrix(5)->setQuantite(1);

        $this->commande->addDetailsCommande($detail);

        $this->assertCount(1, $this->commande->getDetailsCommandes());
        $this->assertSame($this->commande, $detail->getCommande());
        $this->assertSame($offre, $detail->getOffres());
    }
}
