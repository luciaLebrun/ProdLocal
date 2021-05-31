<?php

namespace App\Entity;

use App\Repository\FidelityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FidelityRepository::class)
 */
class Fidelity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Shop::class, inversedBy="fidelity")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shop;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="fidelities"))
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return shop|null
     */
    public function getShop(): ?shop
    {
        return $this->shop;
    }

    /**
     * @param shop $shop
     * @return $this
     */
    public function setShop(shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param int|null $points
     * @return $this
     */
    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return $this
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
