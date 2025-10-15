<?php

namespace App\Entity;

use App\Repository\CategoriesOffresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategoriesOffresRepository::class)]
#[UniqueEntity(fields: ['nom'], message: 'Il existe déjà une catégorie d\'offre avec ce nom')]
class CategoriesOffres
{
    /**
     * Champ de test, permet de différencier les catégories de test
     */
    #[ORM\Column(type: 'boolean')]
    private bool $isTest = false;

    /**
     * Identifiant de la catégorie
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * Nom de la catégorie
     * - obligatoire
     * - unique grâce à UniqueEntity
     * - longueur maximale 255 caractères
     */
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la catégorie est obligatoire')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $nom = null;

    /**
     * Slug de la catégorie
     * - obligatoire
     * - doit être unique dans la base si tu veux ajouter une contrainte d'unicité côté DB
     */
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le slug est obligatoire')]
    #[Assert\Regex(
        pattern: '/^[a-z0-9\-]+$/',
        message: 'Le slug ne peut contenir que des lettres minuscules, des chiffres et des tirets'
    )]
    private ?string $slug = null;

    /**
     * Icône de la catégorie (facultatif)
     */
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icone = null;

    /**
     * Description détaillée (facultatif)
     */
    #[ORM\Column(length:400,type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * Relation OneToMany avec les Offres
     * - mappedBy indique que l'entité Offres possède la relation
     * - Cascade et orphanRemoval peuvent être ajoutés si nécessaire
     */
    #[ORM\OneToMany(targetEntity: Offres::class, mappedBy: 'categorie')]
    private Collection $offres;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
    }

    // ----------------------
    // Getters et setters
    // ----------------------
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function isTest(): bool
    {
        return $this->isTest;
    }

    public function setIsTest(bool $isTest): static
    {
        $this->isTest = $isTest;
        return $this;
    }

    /**
     * Retourne la collection d'offres liées à cette catégorie
     *
     * @return Collection<int, Offres>
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    /**
     * Ajoute une offre à la catégorie
     */
    public function addOffre(Offres $offre): static
    {
        if (!$this->offres->contains($offre)) {
            $this->offres->add($offre);
            $offre->setCategorie($this);
        }
        return $this;
    }

    /**
     * Supprime une offre de la catégorie
     */
    public function removeOffre(Offres $offre): static
    {
        if ($this->offres->removeElement($offre)) {
            if ($offre->getCategorie() === $this) {
                $offre->setCategorie(null);
            }
        }
        return $this;
    }
}
