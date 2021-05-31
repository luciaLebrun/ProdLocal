<?php

namespace App\Entity;

use App\Repository\ShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Les instances de cette classe représentent chacune, un point de vente
 * @ORM\Entity(repositoryClass=ShopRepository::class)
 */
class Shop
{
    /**
     * L'identifiant du point de vente
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Le nom du point de vente
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * L'adresse du point de vente
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * Le numéro de téléphone du point de vente
     * @ORM\Column(type="string", length=10)
     */
    private $telephone;

    /**
     * Les avis clients qui portent sur le point de vente
     * @ORM\OneToMany(targetEntity=Feedback::class, mappedBy="shop")
     */
    private $feedbacks;

    /**
     * Les produits mises en vente par le point de vente
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="shop")
     */
    private $products;

    /**
     * La latitude du point de vente, utile pour la carte
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * La longitude du point de vente, utile pour la carte
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * Les horaires d'ouverture du point de vente
     * @ORM\OneToMany(targetEntity=Schedule::class, mappedBy="shop")
     */
    private $schedule;

    /**
     * La description du point de vente
     * @ORM\Column(type="string", length=2550, nullable=true)
     */
    private $description;

    /**
     * Le nom de l'image du point de vente
     * @ORM\Column(type="string", length=80)
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity=Fidelity::class, mappedBy="shop")
     */
    private $fidelity;

    /**
     * Le constructeur d'une instance de cette classe
     */
    public function __construct()
    {
        $this->feedbacks = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->schedule = new ArrayCollection();
    }

    /**
     * Méhode qui retourne l'identifiant du point de vente
     * @return int|null l'identifiant ou rien
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Méthode qui retourne le nom du point de vente
     * @return string|null le nom du point de vente ou rien
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Méthode qui permet de modifier le nom du point de vente
     * @param string $name le nouveau nom du point de vente
     * @return Shop
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Méthode qui retourne l'adresse du point de vente
     * @return string|null l'adresse ou rien
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Méthode qui permet de modifier l'adresse du point de vente
     * @param string $address la nouvelle adresse
     * @return $this
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Méthode qui retourne le numéro de téléphone du point de vente
     * @return string|null le numéro de téléphone ou rien
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Méthode qui permet de modifier le numéro de téléphone du point de vente
     * @param string $telephone le nouveau numéro de téléphone
     * @return $this
     */
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Méthode qui permet de récupérer les avis clients du point de vente
     * @return Collection|Feedback[] une collection d'avis clients du point de vente
     */
    public function getFeedbacks(): Collection
    {
        return $this->feedbacks;
    }

    /**
     * Méthode qui permet d'ajouter un avis client au point de vente
     * @param Feedback $feedback un avis client
     * @return Shop
     */
    public function addFeedback(Feedback $feedback): self
    {
        if (!$this->feedbacks->contains($feedback)) {
            $this->feedbacks[] = $feedback;
            $feedback->setShop($this);
        }

        return $this;
    }

    /**
     * Méthode qui permet de supprimer un avis client du point de vente
     * @param Feedback $feedback un avis client
     * @return Shop
     */
    public function removeFeedback(Feedback $feedback): self
    {
        if ($this->feedbacks->removeElement($feedback)) {
            // set the owning side to null (unless already changed)
            if ($feedback->getShop() === $this) {
                $feedback->setShop(null);
            }
        }

        return $this;
    }

    /**
     * Méthode qui permet d'obtenir les produits mis en vente par le point de vente
     * @return Collection|Product[] une collection de produits du point de vente
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * Méthode qui permet d'ajouter un produit à mettre en vente par le point de vente
     * @param Product $product un produit
     * @return Shop
     */
    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setShop($this);
        }

        return $this;
    }

    /**
     * Méthode qui permet de supprimer un produit mis en vente par le point de vente
     * @param Product $product un produit
     * @return Shop
     */
    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getShop() === $this) {
                $product->setShop(null);
            }
        }

        return $this;
    }

    /**
     * Méthode qui retourne la latitude du point de vente
     * @return float|null la latitude ou rien
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * Méthode qui permet de modifier la latitude du point de vente
     * @param float $latitude la nouvelle latitude
     * @return $this
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Méthode qui retourne la longitude du point de vente
     * @return float|null la longitude ou rien
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Méthode qui permet de modifier la longitude du point de vente
     * @param float $longitude la nouvelle longitude
     * @return $this
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Méthode qui retourne les horaires d'ouverture du point de vente
     * @return Collection|Schedule[] une collection d'horaires d'ouverture du point de vente
     */
    public function getSchedule(): Collection
    {
        return $this->schedule;
    }

    /**
     * Méthode qui permet d'ajouter une horaire d'ouverture du point de vente
     * @param Schedule $schedule une horaire d'ouverture
     * @return Shop
     */
    public function addSchedule(Schedule $schedule): self
    {
        if (!$this->schedule->contains($schedule)) {
            $this->schedule[] = $schedule;
            $schedule->setShop($this);
        }

        return $this;
    }

    /**
     * Méthode qui permet de supprimer une horaire d'ouverture du point de vente
     * @param Schedule $schedule une horaire d'ouverture
     * @return Shop
     */
    public function removeSchedule(Schedule $schedule): self
    {
        if ($this->schedule->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getShop() === $this) {
                $schedule->setShop(null);
            }
        }

        return $this;
    }

    /**
     * Méthode qui retourne la description du point de vente
     * @return string|null la description ou rien
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Méthode qui permet de modifier la description du point de vente
     * @param string|null $description la description ou rien
     * @return Shop
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Méthode qui retourne le nom de l'image du point de vente
     * @return string|null le nom de l'image
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Méthode qui permet de modifier l'image du point de vente
     * @param string $image le nom de la nouvelle image
     * @return Shop
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFidelity()
    {
        return $this->fidelity;
    }

    /**
     * @param mixed $fidelity
     */
    public function setFidelity($fidelity): void
    {
        $this->fidelity = $fidelity;
    }

}
