<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Les instances de cette classe représentent chacune, un utilisateur identifié/inscrit.
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"email"},
 *     message="L'email est déjà utilisé !"
 * )
 */
class User implements UserInterface
{
    /**
     * L'identifiant de l'utilisateur
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * L'adresse électronique de l'utilisateur
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * Le pseudonyme de l'utilisateur
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * Le mot de passe de l'utilisateur
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire au minimum 8 caractères")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les mots de passe ne correspondent pas !")
     */
    public $confirm_password;

    /**
     * Fidélité de l'utilisateur
     * @ORM\OneToMany(targetEntity=Fidelity::class, mappedBy="user")
     */
    private $fidelities;

    public function __construct()
    {
        $this->fidelities = new ArrayCollection();
    }

    /**
     * Méthode qui retourne l'identifiant de l'utilisateur
     * @return int|null l'identifiant ou rien
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Méthode qui retourne l'adresse mail de l'utilisateur
     * @return string|null l'adresse mail ou rien
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Méthode qui permet de modifier l'adresse mail de l'utilisateur
     * @param string $email la nouvelle adresse mail
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Méthode qui retourne le pseudonyme de l'utilisateur
     * @return string|null le pseudonyme ou rien
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Méthode qui permet de modifier le pseudonyme de l'utilisateur
     * @param string $username le nouveau pseudonyme
     * @return User
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Méthode qui retourne le mot de passe de l'utilisateur
     * @return string|null le mot de passe ou rien
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Méthode qui permet de modifier le mot de passe de l'utilisateur
     * @param string $password le nouveau mot de passe
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Méthode qui permet de récupérer les fidélités d'un utilisateur
     * @return ArrayCollection
     */
    public function getFidelities(): ArrayCollection
    {
        return $this->fidelities;
    }

    /**
     * @param Fidelity $fidelity
     * @return $this
     */
    public function addFidelity(Fidelity $fidelity): self
    {
        if (!$this->fidelities->contains($fidelity)) {
            $this->fidelities[] = $fidelity;
            $fidelity->setUser($this);
        }

        return $this;
    }

    /**
     * @param Fidelity $fidelity
     * @return $this
     */
    public function removeFidelity(Fidelity $fidelity): self
    {
        if ($this->fidelities->removeElement($fidelity)) {
            // set the owning side to null (unless already changed)
            if ($fidelity->getUser() === $this) {
                $fidelity->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    /**
     * @return string|null|void
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     *
     */
    public function eraseCredentials()
    {
    }
}
