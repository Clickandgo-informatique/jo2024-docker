<?php

namespace App\Entity;

use App\Repository\OffresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: OffresRepository::class)]
#[UniqueEntity(fields: ['intitule'], message: 'Il existe déjà une offre avec ce nom.')]
class Offres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule = null;

    #[Assert\Type('numeric')]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    #[Assert\Regex(pattern: '/^\d+(\.\d{1,2})?$/', message: 'Format de nombre invalide')]
    private ?string $prix = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFin = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 8)]
    private ?string $code = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?int $nbrAdultes = null;

    #[ORM\Column]
    private ?int $nbrEnfants = null;

    #[ORM\Column]
    private ?bool $isLocked = false;

    #[ORM\Column]
    private ?bool $isPublished = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;
    #[ORM\Column]
    private ?bool $isPromoted = false;

    /**
     * @var Collection<int, Images>
     */
    #[ORM\OneToMany(targetEntity: Images::class, mappedBy: 'offres', orphanRemoval: true)]
    private Collection $images;

    /**
     * @var Collection<int, DetailsCommandes>
     */
    #[ORM\OneToMany(targetEntity: DetailsCommandes::class, mappedBy: 'offres')]
    private Collection $detailsCommandes;

    #[ORM\ManyToOne(inversedBy: 'offres')]
    #[ORM\JoinColumn(onDelete: 'SET NULL', nullable: true)]
    private ?CategoriesOffres $categorie = null;

    /**
     * @var Collection<int, Sports>
     */
    #[ORM\ManyToMany(targetEntity: Sports::class, inversedBy: 'offres')]
    #[ORM\JoinTable(name: 'offres_sports')]
    private Collection $sports;

    #[ORM\Column(type: 'json')]
    private array $lieux = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->images = new ArrayCollection();
        $this->detailsCommandes = new ArrayCollection();
        $this->sports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): static
    {
        $this->intitule = $intitule;
        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;
        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;
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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getNbrAdultes(): ?int
    {
        return $this->nbrAdultes;
    }

    public function setNbrAdultes(int $nbrAdultes): static
    {
        $this->nbrAdultes = $nbrAdultes;
        return $this;
    }

    public function getNbrEnfants(): ?int
    {
        return $this->nbrEnfants;
    }

    public function setNbrEnfants(int $nbrEnfants): static
    {
        $this->nbrEnfants = $nbrEnfants;
        return $this;
    }

    public function isLocked(): ?bool
    {
        return $this->isLocked;
    }

    public function setIsLocked(bool $isLocked): static
    {
        $this->isLocked = $isLocked;
        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setOffres($this);
        }

        return $this;
    }

    public function removeImage(Images $image): static
    {
        if ($this->images->removeElement($image)) {
            if ($image->getOffres() === $this) {
                $image->setOffres(null);
            }
        }

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
            $detailsCommande->setOffres($this);
        }

        return $this;
    }

    public function removeDetailsCommande(DetailsCommandes $detailsCommande): static
    {
        if ($this->detailsCommandes->removeElement($detailsCommande)) {
            if ($detailsCommande->getOffres() === $this) {
                $detailsCommande->setOffres(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?CategoriesOffres
    {
        return $this->categorie;
    }

    public function setCategorie(?CategoriesOffres $categorie): static
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * @return Collection<int, Sports>
     */
    public function getSports(): Collection
    {
        return $this->sports;
    }

    public function addSport(Sports $sport): static
    {
        if (!$this->sports->contains($sport)) {
            $this->sports->add($sport);
            $sport->addOffre($this); // synchro côté Sports
        }

        return $this;
    }

    public function removeSport(Sports $sport): static
    {
        if ($this->sports->removeElement($sport)) {
            $sport->removeOffre($this); // synchro côté Sports
        }

        return $this;
    }

    public function getLieux(): array
    {
        return $this->lieux;
    }

    public function setLieux(array $lieux): static
    {
        $this->lieux = $lieux;
        return $this;
    }

    /**
     * Get the value of isPromoted
     */
    public function getIsPromoted()
    {
        return $this->isPromoted;
    }

    /**
     * Set the value of isPromoted
     *
     * @return  self
     */
    public function setIsPromoted($isPromoted)
    {
        $this->isPromoted = $isPromoted;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
