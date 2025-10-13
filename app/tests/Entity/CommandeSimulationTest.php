<?php
// tests/Entity/CommandeSimulationTest.php

namespace App\Tests\Entity;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Entity\Offres;
use App\Entity\Tickets;
use App\Entity\Users;
use PHPUnit\Framework\TestCase;

/**
 * Test intégral simulant un panier complet avec commandes, offres, détails et tickets
 */
final class CommandeSimulationTest extends TestCase
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
     * Simule plusieurs offres et plusieurs détails de commande
     * Calcule le total et associe un ticket
     */
    public function testCompleteOrderSimulation(): void
    {
        // Création d'un tableau d'offres simulées
        $offresData = [
            ['intitule' => 'Offre A', 'prix' => '10.50', 'quantite' => 2],
            ['intitule' => 'Offre B', 'prix' => '5.25', 'quantite' => 3],
            ['intitule' => 'Offre C', 'prix' => '7.75', 'quantite' => 1],
        ];

        $expectedTotal = 0;

        foreach ($offresData as $data) {
            $offre = new Offres();
            $offre->setIntitule($data['intitule'])->setPrix($data['prix']);

            $detail = new DetailsCommandes();
            $detail->setOffres($offre)
                ->setPrix((float)$offre->getPrix())
                ->setQuantite($data['quantite']);

            $this->commande->addDetailsCommande($detail);

            $expectedTotal += (float)$offre->getPrix() * $data['quantite'];
        }

        // Vérifie le total calculé
        $this->assertEquals($expectedTotal, $this->commande->getTotalCommande());

        // Création et association du ticket
        $ticket = new Tickets();
        $ticketKey = bin2hex(random_bytes(32));
        $ticket->setTicketKey($ticketKey)
            ->setCommande($this->commande)
            ->setUser($this->user)
            ->computeAndSetPayloadHashFromAccountKey('account_secret');

        $this->commande->setTicket($ticket);

        // Vérifications ticket
        $this->assertSame($ticket, $this->commande->getTicket());
        $this->assertSame($this->commande, $ticket->getCommande());
        $this->assertSame($this->user, $ticket->getUser());
        $this->assertNotNull($ticket->getPayloadHash());
        $this->assertEquals(64, strlen($ticket->getPayloadHash()));

        // Simuler l'utilisation du ticket
        $usedAt = new \DateTimeImmutable();
        $ticket->setIsUsed(true)->setUsedAt($usedAt);

        $this->assertTrue($ticket->isUsed());
        $this->assertSame($usedAt, $ticket->getUsedAt());

        // Vérifier que tous les détails sont correctement liés à la commande et aux offres
        foreach ($this->commande->getDetailsCommandes() as $detail) {
            $this->assertSame($this->commande, $detail->getCommande());
            $this->assertInstanceOf(Offres::class, $detail->getOffres());
        }
    }
}
