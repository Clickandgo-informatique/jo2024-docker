<?php
// src/Entity/Tickets.php

namespace App\Entity;

use App\Repository\TicketsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketsRepository::class)]
#[ORM\Table(name: "tickets")]
class Tickets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Clé unique du ticket (générée au moment du paiement)
    #[ORM\Column(length: 64, unique: true, nullable: false)]
    private ?string $ticketKey = null;

    // Hash payload (sha256 hex) embarqué dans le QR code — utilisé pour la vérification
    #[ORM\Column(length: 64, unique: true, nullable: true)]
    private ?string $payloadHash = null;

    // QR code SVG inline ou autre contenu
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $qrCodePath = null;

    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: 'boolean')]
    private bool $isUsed = false;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Users $user = null;

    #[ORM\OneToOne(inversedBy: 'ticket', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commandes $commande = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTicketKey(): ?string
    {
        return $this->ticketKey;
    }

    public function setTicketKey(string $ticketKey): static
    {
        $this->ticketKey = $ticketKey;
        return $this;
    }

    public function getPayloadHash(): ?string
    {
        return $this->payloadHash;
    }

    public function setPayloadHash(string $payloadHash): static
    {
        $this->payloadHash = $payloadHash;
        return $this;
    }

    /**
     * Convenience: compute payload hash from accountKey (binary) + ticketKey (hex string)
     * and set payloadHash automatically.
     */
    public function computeAndSetPayloadHashFromAccountKey(string $accountKey): static
    {
        if ($this->ticketKey === null) {
            throw new \LogicException('ticketKey must be set before computing payloadHash.');
        }

        // accountKey can be binary; hash returns hex 64 chars
        $this->payloadHash = hash('sha256', $accountKey . $this->ticketKey);
        return $this;
    }

    public function getQrCodePath(): ?string
    {
        return $this->qrCodePath;
    }

    public function setQrCodePath(?string $qrCodePath): static
    {
        $this->qrCodePath = $qrCodePath;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function isUsed(): bool
    {
        return $this->isUsed;
    }

    public function setIsUsed(bool $isUsed): static
    {
        $this->isUsed = $isUsed;
        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getCommande(): ?Commandes
    {
        return $this->commande;
    }

    public function setCommande(?Commandes $commande): static
    {
        $this->commande = $commande;
        return $this;
    }
}
