<?php
// tests/Entity/TicketsTest.php

namespace App\Tests\Entity;

use App\Entity\Tickets;
use App\Entity\Commandes;
use App\Entity\Users;
use PHPUnit\Framework\TestCase;

/**
 * Test unitaire de l'entité Tickets.
 */
final class TicketsTest extends TestCase
{
    private Tickets $ticket;

    protected function setUp(): void
    {
        $this->ticket = new Tickets();
    }

    /**
     * Vérifie que le ticket peut avoir une clé unique assignée
     */
    public function testSetAndGetTicketKey(): void
    {
        $key = bin2hex(random_bytes(32));
        $this->ticket->setTicketKey($key);

        $this->assertSame($key, $this->ticket->getTicketKey());
        $this->assertEquals(64, strlen($this->ticket->getTicketKey()));
    }

    /**
     * Vérifie le calcul du payloadHash à partir d'un accountKey
     */
    public function testComputePayloadHash(): void
    {
        $accountKey = 'account_secret_key';
        $ticketKey = bin2hex(random_bytes(32));
        $this->ticket->setTicketKey($ticketKey);

        $this->ticket->computeAndSetPayloadHashFromAccountKey($accountKey);

        $expectedHash = hash('sha256', $accountKey . $ticketKey);
        $this->assertSame($expectedHash, $this->ticket->getPayloadHash());
        $this->assertEquals(64, strlen($this->ticket->getPayloadHash()));
    }

    /**
     * Vérifie les relations avec Commandes et Users
     */
    public function testRelations(): void
    {
        $user = new Users();
        $commande = new Commandes();

        $this->ticket->setUser($user);
        $this->ticket->setCommande($commande);
        $this->ticket->setValidatedBy($user);

        $this->assertSame($user, $this->ticket->getUser());
        $this->assertSame($commande, $this->ticket->getCommande());
        $this->assertSame($user, $this->ticket->getValidatedBy());
    }

    /**
     * Vérifie l'état du ticket (isUsed, usedAt, expiresAt)
     */
    public function testStateProperties(): void
    {
        $usedAt = new \DateTimeImmutable('2025-10-11 10:00:00');
        $expiresAt = new \DateTimeImmutable('2025-10-12 23:59:59');

        $this->ticket->setIsUsed(true);
        $this->ticket->setUsedAt($usedAt);
        $this->ticket->setExpiresAt($expiresAt);

        $this->assertTrue($this->ticket->isUsed());
        $this->assertSame($usedAt, $this->ticket->getUsedAt());
        $this->assertSame($expiresAt, $this->ticket->getExpiresAt());
    }

    /**
     * Vérifie l'assignation du chemin QR code
     */
    public function testQrCodePath(): void
    {
        $path = '/qrcodes/ticket123.svg';
        $this->ticket->setQrCodePath($path);

        $this->assertSame($path, $this->ticket->getQrCodePath());
    }

    /**
     * Vérifie que created_at est initialisé automatiquement
     */
    public function testCreatedAtInitialization(): void
    {
        $createdAt = $this->ticket->getCreatedAt();
        $this->assertInstanceOf(\DateTimeImmutable::class, $createdAt);
        $this->assertLessThanOrEqual(new \DateTimeImmutable(), $createdAt);
    }
}
