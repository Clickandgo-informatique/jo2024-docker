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
    // Identifiant unique de l'offre
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Intitulé de l'offre (nom)
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'intitulé de l'offre est obligatoire.")]
    #[Assert\Length(max: 255, maxMessage: "L'intitulé ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $intitule = null;

    // Prix de l'offre (float pour valeurs décimales)
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    #[Assert\NotBlank(message: "Le prix est obligatoire.")]
    #[Assert\Type(type: 'numeric', message: "Le prix doit être un nombre.")]
    #[Assert\PositiveOrZero(message: "Le prix doit être supérieur ou égal à zéro.")]
    private ?string $prix = null;

    // Date de début de validité de l'offre
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull(message: "La date de début est obligatoire.")]
    #[Assert\Type(\DateTimeInterface::class)]
    private ?\DateTime $dateDebut = null;

    // Date de fin de validité de l'offre
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull(message: "La date de fin est obligatoire.")]
    #[Assert\Type(\DateTimeInterface::class)]
    #[Assert\Expression(
        "this.getDateFin() >= this.getDateDebut()",
        message: "La date de fin doit être supérieure ou égale à la date de début."
    )]
    private ?\DateTime $dateFin = null;

    // Description libre
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    // Code unique pour l'offre
    #[ORM\Column(length: 8)]
    #[Assert\NotBlank(message: "Le code est obligatoire.")]
    #[Assert\Length(max: 8, maxMessage: "Le code ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $code = null;

    // Date de création
    #[ORM\Column]
    #[Assert\NotNull]
    private ?\DateTimeImmutable $createdAt = null;

    // Date de dernière mise à jour
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    // Nombre maximum d'adultes
    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\PositiveOrZero(message: "Le nombre d'adultes doit être positif ou nul.")]
    private ?int $nbrAdultes = null;

    // Nombre maximum d'enfants
    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\PositiveOrZero(message: "Le nombre d'enfants doit être positif ou nul.")]
    private ?int $nbrEnfants = null;

    // Indique si l'offre est verrouillée
    #[ORM\Column]
    private ?bool $isLocked = false;

    // Indique si l'offre est publiée
    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $isPublished = null;

    // Slug pour l'URL
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    // Indique si l'offre est mise en avant
    #[ORM\Column]
    private ?bool $isPromoted = false;

    /**
     * Collection d'images associées à l'offre
     * @var Collection<int, Images>
     */
    #[ORM\OneToMany(targetEntity: Images::class, mappedBy: 'offres', orphanRemoval: true)]
    private Collection $images;

    /**
     * Détails des commandes associées à l'offre
     * @var Collection<int, DetailsCommandes>
     */
    #[ORM\OneToMany(targetEntity: DetailsCommandes::class, mappedBy: 'offres')]
    private Collection $detailsCommandes;

    // Catégorie de l'offre
    #[ORM\ManyToOne(inversedBy: 'offres')]
    #[ORM\JoinColumn(onDelete: 'SET NULL', nullable: true)]
    private ?CategoriesOffres $categorie = null;

    /**
     * Sports associés à l'offre
     * @var Collection<int, Sports>
     */
    #[ORM\ManyToMany(targetEntity: Sports::class, inversedBy: 'offres')]
    #[ORM\JoinTable(name: 'offres_sports')]
    private Collection $sports;

    // Liste des lieux disponibles pour l'offre
    #[ORM\Column(type: 'json')]
    private array $lieux = [];

    // Image principale de l'offre
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, FavorisOffres>
     */
    #[ORM\OneToMany(targetEntity: FavorisOffres::class, mappedBy: 'offre', orphanRemoval: true)]
    private Collection $favorisOffres;



    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->images = new ArrayCollection();
        $this->detailsCommandes = new ArrayCollection();
        $this->sports = new ArrayCollection();
        $this->favorisOffres = new ArrayCollection();
    }

    // -------------------------------
    // Getters et Setters
    // -------------------------------

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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
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

    public function getIsPromoted(): ?bool
    {
        return $this->isPromoted;
    }

    public function setIsPromoted(bool $isPromoted): static
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

    public function getSports(): Collection
    {
        return $this->sports;
    }

    public function addSport(Sports $sport): static
    {
        if (!$this->sports->contains($sport)) {
            $this->sports->add($sport);
            $sport->addOffre($this);
        }

        return $this;
    }

    public function removeSport(Sports $sport): static
    {
        if ($this->sports->removeElement($sport)) {
            $sport->removeOffre($this);
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
     * @return Collection<int, FavorisOffres>
     */
    public function getFavorisOffres(): Collection
    {
        return $this->favorisOffres;
    }

    public function addFavorisOffre(FavorisOffres $favorisOffre): static
    {
        if (!$this->favorisOffres->contains($favorisOffre)) {
            $this->favorisOffres->add($favorisOffre);
            $favorisOffre->setOffre($this);
        }

        return $this;
    }

    public function removeFavorisOffre(FavorisOffres $favorisOffre): static
    {
        if ($this->favorisOffres->removeElement($favorisOffre)) {
            // set the owning side to null (unless already changed)
            if ($favorisOffre->getOffre() === $this) {
                $favorisOffre->setOffre(null);
            }
        }

        return $this;
    }
    //Gestion des favoris d'offres
    public function isFavori(?Users $user): bool
    {
        if (!$user) {
            return false;
        }

        foreach ($this->favorisOffres as $favori) {
            if ($favori->getUtilisateur() === $user) {
                return true;
            }
        }

        return false;
    }
}
