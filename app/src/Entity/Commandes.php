<?php
// App\Entity\Commandes.php
namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20, unique: true)]
    private ?string $reference = null;

    // Correction : propriété camelCase côté PHP, nom snake_case côté BDD
    #[ORM\Column(type: 'datetime_immutable', name: 'created_at', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Users $user = null;

    /**
     * @var Collection<int, DetailsCommandes>
     */
    #[ORM\OneToMany(targetEntity: DetailsCommandes::class, mappedBy: 'commande', orphanRemoval: true, cascade: ['persist'])]
    private Collection $detailsCommandes;

    #[ORM\OneToOne(mappedBy: 'commande', cascade: ['persist', 'remove'])]
    private ?Tickets $ticket = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $payeeLe = null;

    #[ORM\Column(type: "string", unique: true)]
    private string $qrToken;

    #[ORM\Column(type: "datetime_immutable", nullable: true)]
    private ?\DateTimeImmutable $dateScan = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    private ?Users $scannedBy = null;

    public function __construct()
    {
        $this->detailsCommandes = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->qrToken = bin2hex(random_bytes(16)); // ✅ Token unique généré automatiquement
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
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

    /**
     * @return Collection<int, DetailsCommandes>
     */
    public function getDetailsCommandes(): Collection
    {
        return $this->detailsCommandes;
    }

    public function addDetailsCommande(DetailsCommandes $detailsCommande): static
    {
        if (!$this->detailsCommandes->contains($detailsCommande)) {
            $this->detailsCommandes->add($detailsCommande);
            $detailsCommande->setCommande($this);
        }
        return $this;
    }

    public function removeDetailsCommande(DetailsCommandes $detailsCommande): static
    {
        if ($this->detailsCommandes->removeElement($detailsCommande)) {
            if ($detailsCommande->getCommande() === $this) {
                $detailsCommande->setCommande(null);
            }
        }
        return $this;
    }

    public function getTicket(): ?Tickets
    {
        return $this->ticket;
    }

    public function setTicket(Tickets $ticket): static
    {
        if ($ticket->getCommande() !== $this) {
            $ticket->setCommande($this);
        }
        $this->ticket = $ticket;
        return $this;
    }

    public function getTotalCommande(): float
    {
        $total = 0;
        foreach ($this->getDetailsCommandes() as $item) {
            $total += $item->getPrix() * $item->getQuantite(); // Correction pour inclure la quantité
        }
        return $total;
    }

    public function getPayeeLe(): ?\DateTimeImmutable
    {
        return $this->payeeLe;
    }

    public function setPayeeLe(?\DateTimeImmutable $payeeLe): static
    {
        $this->payeeLe = $payeeLe;
        return $this;
    }

    public function getQrToken(): string
    {
        return $this->qrToken;
    }

    public function setQrToken(string $qrToken): static
    {
        $this->qrToken = $qrToken;
        return $this;
    }

    public function getDateScan(): ?\DateTimeImmutable
    {
        return $this->dateScan;
    }

    public function setDateScan(?\DateTimeImmutable $dateScan): static
    {
        $this->dateScan = $dateScan;
        return $this;
    }

    public function getScannedBy(): ?Users
    {
        return $this->scannedBy;
    }

    public function setScannedBy(?Users $scannedBy): static
    {
        $this->scannedBy = $scannedBy;
        return $this;
    }
}
