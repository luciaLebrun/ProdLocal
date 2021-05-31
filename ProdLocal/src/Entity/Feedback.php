<?php

namespace App\Entity;

use App\Repository\FeedbackRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Les instances de cette classe représentent les avis d'un client.
 * @ORM\Table(name="feedback", uniqueConstraints={@ORM\UniqueConstraint(name="feedback_unique", columns={"shop", "author"})})
 * @ORM\Entity(repositoryClass=FeedbackRepository::class)
 * @UniqueEntity(fields={"shop","author"}, message="Vous ne pouvez pas poster un autre avis!")
 */
class Feedback
{
    /**
     * L'identifiant de l'avis
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Le point de vente qui est concerné par l'avis
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="feedbacks")
     * @ORM\JoinColumn(name="shop", nullable=false)
     */
    private $shop;

    /**
     * L'auteur de l'avis
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * L'avis
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * La date de publication de l'avis
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * La note sur 5 que l'auteur a laissé
     * @ORM\Column(type="integer")
     * @Assert\LessThanOrEqual(value="5", message="Vous ne pouvez pas mettre plus de 5 étoiles")
     * @Assert\GreaterThanOrEqual(value="0", message="Vous ne pouvez pas mettre moins de 0 étoiles")
     */
    private $rate;

    /**
     * Méthode qui retourne l'identifiant de l'avis
     * @return int|null l'identifiant ou rien
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Méthode qui retourne le point de vente qui est concerné par l'avis
     * @return Shop|null une instance de point de vente ou rien
     */
    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    /**
     * Méthode qui permet de modifier le point de vente concernée par l'avis
     * @param Shop|null $shop une nouvelle instance de point de vente ou rien
     * @return Feedback
     */
    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Méthode qui permet de modifier l'auteur de l'avis
     * @return string|null l'auteur
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Méthode qui permet de modifier l'auteur de l'avis
     * @param string $author le nouvel auteur
     * @return Feedback
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Méthode qui retourne le contenu de l'avis
     * @return string|null le contenu de l'avis
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Méthode qui permet de modifier le contenu de l'avis
     * @param string $text le nouveau contenu de l'anis
     * @return Feedback
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Méthode qui retourne la date de publication de l'avis
     * @return DateTimeInterface|null la date de publication ou rien
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Méthode qui permet de modfier la date de publication de l'avis
     * @param DateTimeInterface $date la nouvelle date de publication
     * @return Feedback
     */
    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Méthode qui retourne la note de l'avis que l'auteur a laissé
     * @return int|null la note ou rien
     */
    public function getRate(): ?int
    {
        return $this->rate;
    }

    /**
     * Méthode qui permet de modifer la note
     * @param int $rate la nouvelle note
     * @return Feedback
     */
    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}
