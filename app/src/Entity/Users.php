<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_NICKNAME', fields: ['nickname'])]
#[UniqueEntity(fields: ['nickname'], message: "Il existe déjà un compte avec ce pseudo, veuillez vérifier votre saisie")]
#[UniqueEntity(fields: ['email'], message: "Un compte existe déjà avec cet email.")]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Pseudo (obligatoire, 3-25 caractères)
    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: "Le pseudo est obligatoire.")]
    #[Assert\Length(
        min: 3,
        max: 25,
        minMessage: "Le pseudo doit contenir au moins {{ limit }} caractères.",
        maxMessage: "Le pseudo ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $nickname = null;

    // Email (obligatoire, format valide)
    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: "L’email est obligatoire.")]
    #[Assert\Email(message: "L’adresse email \"{{ value }}\" n’est pas valide.")]
    private ?string $email = null;

    // Rôles (avec validation que chaque rôle est dans la liste autorisée)
    #[ORM\Column]
    #[Assert\All([
        new Assert\Choice(
            choices: ['ROLE_USER', 'ROLE_ADMIN', 'ROLE_SALES_MANAGER'],
            message: 'Rôle invalide.'
        )
    ])]
    private array $roles = ['ROLE_USER'];

    // Mot de passe (stocké hashé, validation au niveau du formulaire)
    #[ORM\Column]
    private ?string $password = null;

    // Vérification email
    #[ORM\Column(type: 'boolean')]
    private bool $isVerified = false;

    // Date de création (obligatoire)
    #[ORM\Column(type: 'datetime_immutable')]
    #[Assert\NotNull(message: "La date de création doit être définie.")]
    private ?\DateTimeImmutable $createdAt = null;

    // Informations optionnelles
    #[ORM\Column(type: 'string', length: 36, nullable: true)]
    private ?string $accountKey = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $google2FASecret = null;

    #[ORM\Column(type: 'boolean')]
    private bool $is2FAEnabled = false;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $trustedToken = null;

    // Relations vers commandes et tickets
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commandes::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'validatedBy', targetEntity: Tickets::class)]
    private Collection $tickets;

    // Informations personnelles optionnelles
    #[ORM\Column(length: 60, nullable: true)]
    #[Assert\Length(max: 60, maxMessage: "Le prénom ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $firstname = null;

    #[ORM\Column(length: 60, nullable: true)]
    #[Assert\Length(max: 60, maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $lastname = null;

    #[ORM\Column(length: 80, nullable: true)]
    #[Assert\Length(max: 80, maxMessage: "La ville ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $city = null;

    #[ORM\Column(length: 6, nullable: true)]
    #[Assert\Regex(
        pattern: '/^[0-9]{4,6}$/',
        message: "Le code postal doit contenir entre 4 et 6 chiffres."
    )]
    private ?string $zipcode = null;

    #[ORM\Column(length: 80, nullable: true)]
    #[Assert\Length(max: 80, maxMessage: "Le pays ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $country = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Assert\Length(max: 150, maxMessage: "L’adresse ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $address = null;

    // Divers
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $used_at = null;

    private bool $isTwoFactorVerified = false;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->roles = ['ROLE_USER'];
        $this->commandes = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    // ------------------- GETTERS / SETTERS -------------------

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }
    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);
    }
    public function setRoles(array $roles): self
    {
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function eraseCredentials(): void {}

    public function isVerified(): bool
    {
        return $this->isVerified;
    }
    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getAccountKey(): ?string
    {
        return $this->accountKey;
    }
    public function setAccountKey(string $accountKey): self
    {
        $this->accountKey = $accountKey;
        return $this;
    }

    public function getAccountKeyHex(): ?string
    {
        return $this->accountKey ? bin2hex($this->accountKey) : null;
    }

    public function getGoogle2FASecret(): ?string
    {
        return $this->google2FASecret;
    }
    public function setGoogle2FASecret(?string $secret): self
    {
        $this->google2FASecret = $secret;
        return $this;
    }

    public function is2FAEnabled(): bool
    {
        return $this->is2FAEnabled;
    }
    public function setIs2FAEnabled(bool $enabled): self
    {
        $this->is2FAEnabled = $enabled;
        return $this;
    }

    public function getTrustedToken(): ?string
    {
        return $this->trustedToken;
    }
    public function setTrustedToken(?string $trustedToken): self
    {
        $this->trustedToken = $trustedToken;
        return $this;
    }

    public function isTwoFactorVerified(): bool
    {
        return $this->isTwoFactorVerified;
    }
    public function setIsTwoFactorVerified(bool $verified): self
    {
        $this->isTwoFactorVerified = $verified;
        return $this;
    }

    public function getUsedAt(): ?\DateTimeImmutable
    {
        return $this->used_at;
    }
    public function setUsedAt(?\DateTimeImmutable $used_at): self
    {
        $this->used_at = $used_at;
        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }
    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }
    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }
    public function setCountry(?string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }
    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    /** @return Collection<int, Commandes> */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }
    public function addCommande(Commandes $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setUser($this);
        }
        return $this;
    }
    public function removeCommande(Commandes $commande): self
    {
        if ($this->commandes->removeElement($commande) && $commande->getUser() === $this) {
            $commande->setUser(null);
        }
        return $this;
    }

    /** @return Collection<int, Tickets> */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }
}
