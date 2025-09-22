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

    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

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
    private ?\DateTimeImmutable $payee_le = null;

    #[ORM\Column(type: "string", unique: true)]
    private string $qrToken;

    #[ORM\Column(type: "datetime_immutable", nullable: true)]
    private ?\DateTimeImmutable $dateScan = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    private ?Users $scannedBy = null;

    public function __construct()
    {
        $this->detailsCommandes = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
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
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;
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
        // cohérence bidirectionnelle
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
            $total += $item->getPrix();
        }
        return $total;
    }

    public function getPayeeLe(): ?\DateTimeImmutable
    {
        return $this->payee_le;
    }

    public function setPayeeLe(?\DateTimeImmutable $payee_le): static
    {
        $this->payee_le = $payee_le;
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
