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
#[UniqueEntity(fields: ['nickname'], message: 'Il existe déjà un compte avec ce pseudo,veuillez vérifier votre saisie')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Length(
        min: 3,
        max: 25,
        minMessage: 'Minimum {{ limit }} caractères',
        maxMessage: 'Maximum {{ limit }} caractères'
    )]
    private ?string $nickname = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private bool $isVerified = false;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    // ✅ Clé binaire de 32 octets, nullable par défaut
    #[ORM\Column(type: 'binary', length: 32, nullable: true)]
    private ?string $accountKey = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $google2FASecret = null;

    #[ORM\Column(type: 'boolean')]
    private bool $is2FAEnabled = false;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $trustedToken = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commandes::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
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

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

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

    // ✅ AccountKey
    public function getAccountKey(): ?string
    {
        return $this->accountKey;
    }

    public function setAccountKey(string $accountKey): self
    {
        $this->accountKey = $accountKey;

        return $this;
    }

    // ✅ Pour avoir la clé en format lisible (hexadécimal)
    public function getAccountKeyHex(): ?string
    {
        return $this->accountKey ? bin2hex($this->accountKey) : null;
    }

    /**
     * Get the value of nickname
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     *
     * @return  self
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
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

    /**
     * Get the value of trustedToken
     */
    public function getTrustedToken()
    {
        return $this->trustedToken;
    }

    /**
     * Set the value of trustedToken
     *
     * @return  self
     */
    public function setTrustedToken($trustedToken)
    {
        $this->trustedToken = $trustedToken;

        return $this;
    }
    // src/Entity/Users.php

    //Vérification double facteur sans persistence en base

    private bool $isTwoFactorVerified = false;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $used_at = null;

    /**
     * @var Collection<int, Tickets>
     */
    #[ORM\OneToMany(targetEntity: Tickets::class, mappedBy: 'validatedBy')]
    private Collection $tickets;

    public function isTwoFactorVerified(): bool
    {
        return $this->isTwoFactorVerified;
    }

    public function setIsTwoFactorVerified(bool $verified): self
    {
        $this->isTwoFactorVerified = $verified;
        return $this;
    }
    /**
     * @return Collection<int, Commandes>
     */
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
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }
        return $this;
    }

    public function getUsedAt(): ?\DateTimeImmutable
    {
        return $this->used_at;
    }

    public function setUsedAt(?\DateTimeImmutable $used_at): static
    {
        $this->used_at = $used_at;

        return $this;
    }

    /**
     * @return Collection<int, Tickets>
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Tickets $ticket): static
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets->add($ticket);
            $ticket->setValidatedBy($this);
        }

        return $this;
    }

    public function removeTicket(Tickets $ticket): static
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getValidatedBy() === $this) {
                $ticket->setValidatedBy(null);
            }
        }

        return $this;
    }
}

