<?php
// tests/Entity/CommandePanierStressSimulationTest.php

namespace App\Tests\Entity;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Entity\Offres;
use App\Entity\Tickets;
use App\Entity\Users;
use PHPUnit\Framework\TestCase;

/**
 * Test de stress : simule un panier complet avec 10 à 20 offres et tickets
 */
final class CommandePanierStressSimulationTest extends TestCase
{
    private Users $user;
    private Commandes $commande;

    protected function setUp(): void
    {
        $this->user = new Users();
        $this->commande = new Commandes();
        $this->commande->setUser($this->user);
    }

    /**
     * Test complet avec plusieurs offres et tickets
     */
    public function testStressOrderSimulation(): void
    {
        $numOffres = random_int(10, 20);
        $expectedTotal = 0;

        for ($i = 1; $i <= $numOffres; $i++) {
            $prix = mt_rand(500, 2000) / 100; // prix aléatoire entre 5.00 et 20.00
            $quantite = mt_rand(1, 5); // quantité aléatoire entre 1 et 5

            $offre = new Offres();
            $offre->setIntitule("Offre $i")->setPrix((string)$prix);

            $detail = new DetailsCommandes();
            $detail->setOffres($offre)
                ->setPrix($prix)
                ->setQuantite($quantite);

            $this->commande->addDetailsCommande($detail);

            $expectedTotal += $prix * $quantite;
        }

        // Vérifie le total calculé par la commande
        $this->assertEquals($expectedTotal, $this->commande->getTotalCommande());

        // Crée un ticket pour la commande
        $ticket = new Tickets();
        $ticketKey = bin2hex(random_bytes(32));
        $ticket->setTicketKey($ticketKey)
            ->setCommande($this->commande)
            ->setUser($this->user)
            ->computeAndSetPayloadHashFromAccountKey('stress_account');

        $this->commande->setTicket($ticket);

        // Vérifications principales
        $this->assertSame($ticket, $this->commande->getTicket());
        $this->assertSame($this->commande, $ticket->getCommande());
        $this->assertSame($this->user, $ticket->getUser());
        $this->assertNotNull($ticket->getPayloadHash());
        $this->assertEquals(64, strlen($ticket->getPayloadHash()));

        // Simulation d'utilisation aléatoire du ticket
        $used = (bool)random_int(0, 1);
        $ticket->setIsUsed($used);
        if ($used) {
            $usedAt = new \DateTimeImmutable();
            $ticket->setUsedAt($usedAt);
            $this->assertSame($usedAt, $ticket->getUsedAt());
        }

        // Vérifie que tous les détails sont liés correctement
        foreach ($this->commande->getDetailsCommandes() as $detail) {
            $this->assertSame($this->commande, $detail->getCommande());
            $this->assertInstanceOf(Offres::class, $detail->getOffres());
            $this->assertGreaterThan(0, $detail->getQuantite());
            $this->assertGreaterThan(0, $detail->getPrix());
        }
    }
}
