<?php
// src/Entity/Tickets.php

namespace App\Entity;

use App\Repository\TicketsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TicketsRepository::class)]
#[ORM\Table(name: "tickets")]
class Tickets
{
    // Identifiant unique du ticket
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Clé unique du ticket (64 caractères), obligatoire et unique
    #[ORM\Column(length: 64, unique: true, nullable: false)]
    #[Assert\NotBlank(message: 'La clé du ticket est obligatoire.')]
    #[Assert\Length(
        min: 64,
        max: 64,
        exactMessage: 'La clé du ticket doit faire exactement {{ limit }} caractères.'
    )]
    private ?string $ticketKey = null;

    // Hash du payload (sha256 hex) utilisé pour la vérification
    #[ORM\Column(length: 64, unique: true, nullable: true)]
    #[Assert\Length(
        min: 64,
        max: 64,
        exactMessage: 'Le hash du payload doit faire exactement {{ limit }} caractères.'
    )]
    private ?string $payloadHash = null;

    // Chemin ou contenu QR code (SVG/base64/etc)
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $qrCodePath = null;

    // Date de création du ticket (initialisée automatiquement)
    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    // Indique si le ticket a été utilisé
    #[ORM\Column(type: 'boolean')]
    private bool $isUsed = false;

    // Utilisateur possédant le ticket
    #[ORM\ManyToOne(inversedBy: 'tickets')]
    #[ORM\JoinColumn(nullable: true, onDelete: "SET NULL")]
    private ?Users $user = null;

    // Commande associée (obligatoire)
    #[ORM\OneToOne(inversedBy: 'ticket', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commandes $commande = null;

    // Date et heure de l'utilisation du ticket
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $usedAt = null;

    // Utilisateur ayant validé le ticket (scanner/admin)
    #[ORM\ManyToOne(inversedBy: 'tickets')]
    private ?Users $validatedBy = null;

    // Date d'expiration du ticket
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $expiresAt = null;

    public function __construct()
    {
        // Initialise la date de création automatiquement
        $this->created_at = new \DateTimeImmutable();
    }

    // -------------------------------
    // Getters et Setters
    // -------------------------------

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
     * Calcule et assigne automatiquement le hash du payload
     * à partir de la clé utilisateur et ticketKey.
     */
    public function computeAndSetPayloadHashFromAccountKey(string $accountKey): static
    {
        if ($this->ticketKey === null) {
            throw new \LogicException('ticketKey doit être défini avant de calculer le payloadHash.');
        }

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

    public function getUsedAt(): ?\DateTimeImmutable
    {
        return $this->usedAt;
    }

    public function setUsedAt(?\DateTimeImmutable $usedAt): static
    {
        $this->usedAt = $usedAt;
        return $this;
    }

    public function getValidatedBy(): ?Users
    {
        return $this->validatedBy;
    }

    public function setValidatedBy(?Users $validatedBy): static
    {
        $this->validatedBy = $validatedBy;
        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(?\DateTimeImmutable $expiresAt): static
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }
}
