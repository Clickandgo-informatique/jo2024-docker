<?php

namespace App\Entity;

use App\Repository\DetailsCommandesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DetailsCommandesRepository::class)]
class DetailsCommandes
{
    /**
     * Quantité commandée pour une offre donnée.
     */
    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull(message: "La quantité ne peut pas être nulle.")]
    #[Assert\Positive(message: "La quantité doit être supérieure à zéro.")]
    private ?int $quantite = null;

    /**
     * Prix unitaire de l'offre au moment de la commande.
     * Utilisation d'un float pour permettre les valeurs décimales.
     */
    #[ORM\Column(type: 'float')]
    #[Assert\NotNull(message: "Le prix doit être renseigné.")]
    #[Assert\PositiveOrZero(message: "Le prix ne peut pas être négatif.")]
    private ?float $prix = 0.0;

    /**
     * Commande associée (clé composite avec Offres).
     * Une commande peut contenir plusieurs détails.
     */
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'detailsCommandes')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Assert\NotNull(message: "Une commande doit être associée.")]
    private ?Commandes $commande = null;

    /**
     * Offre associée à la ligne de commande.
     * Permet de connaître le produit ou service acheté.
     */
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'detailsCommandes')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Assert\NotNull(message: "Une offre doit être associée.")]
    private ?Offres $offres = null;

    // -------------------------------
    // Getters et Setters
    // -------------------------------

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;
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

    public function getOffres(): ?Offres
    {
        return $this->offres;
    }

    public function setOffres(?Offres $offres): static
    {
        $this->offres = $offres;
        return $this;
    }
}
