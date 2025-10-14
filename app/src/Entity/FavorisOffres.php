<?php

namespace App\Entity;

use App\Repository\FavorisOffresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavorisOffresRepository::class)]
class FavorisOffres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'favorisOffres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'favorisOffres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offres $offre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Users
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Users $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getOffre(): ?Offres
    {
        return $this->offre;
    }

    public function setOffre(?Offres $offre): static
    {
        $this->offre = $offre;

        return $this;
    }
}
