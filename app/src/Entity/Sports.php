<?php

namespace App\Entity;

use App\Repository\SportsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SportsRepository::class)]
#[UniqueEntity(fields: ['intitule'], message: 'Il existe déjà une discipline sportive avec ce nom')]
class Sports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: "Le nom de la discipline sportive est obligatoire")]
    #[Assert\Length(
        min: 3,
        max: 150,
        maxMessage: "Le nom de la discipline sportive ne peut pas dépasser {{ limit }} caractères",
        minMessage: "Le nom de la discipline sportive doit contenir au moins {{ limit }} caractères"
    )]
    private ?string $intitule = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(
        max: 100,
        maxMessage: "Le nom du fichier icône ne peut pas dépasser {{ limit }} caractères"
    )]
    private ?string $icone = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Assert\Regex(
        pattern: '/^#[0-9A-Fa-f]{6}$/',
        message: "La couleur doit être un code hexadécimal valide (ex: #FFFFFF)",
        match: true
    )]
    private ?string $background_color = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        min: 3,
        maxMessage: "Le slug ne peut pas dépasser {{ limit }} caractères",
        minMessage: "Le slug doit contenir au moins {{ limit }} caractères"
    )]
    private ?string $slug = null;

        // ✅ emoji → VARCHAR(10) utf8mb4
    #[ORM\Column(type: "string", length: 10, options: ["charset" => "utf8mb4", "collation" => "utf8mb4_unicode_ci"])]
    private string $emoji;

    // ✅ pictogramme → VARCHAR classique
    #[ORM\Column(length: 255)]
    private string $pictogramme;

    /**
     * @var Collection<int, Offres>
     */
    #[ORM\ManyToMany(targetEntity: Offres::class, mappedBy: 'sports')]
    private Collection $offres;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
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

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(?string $icone): static
    {
        $this->icone = $icone;
        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->background_color;
    }

    public function setBackgroundColor(?string $background_color): static
    {
        $this->background_color = $background_color;
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
     * @return Collection<int, Offres>
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offres $offre): static
    {
        if (!$this->offres->contains($offre)) {
            $this->offres->add($offre);
            $offre->addSport($this);
        }

        return $this;
    }

    public function removeOffre(Offres $offre): static
    {
        if ($this->offres->removeElement($offre)) {
            $offre->removeSport($this);
        }

        return $this;
    }

    /**
     * Get the value of emoji
     */ 
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * Set the value of emoji
     *
     * @return  self
     */ 
    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * Get the value of pictogramme
     */ 
    public function getPictogramme()
    {
        return $this->pictogramme;
    }

    /**
     * Set the value of pictogramme
     *
     * @return  self
     */ 
    public function setPictogramme($pictogramme)
    {
        $this->pictogramme = $pictogramme;

        return $this;
    }
}
