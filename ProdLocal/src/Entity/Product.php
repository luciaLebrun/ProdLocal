<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Les instances de cette classe représentent chacune, un produit.
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * L'identifiant du produit
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Le nom du produit
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * Le point de vente qui vend ce produit
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shop;

    /**
     * La quantité restante en stock du produit
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * Le prix d'une unité de produit
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * La description du produit
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * La catégorie du produit
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * Le nom de l'image du produit
     * @ORM\Column(type="string", length=80)
     */
    private $image;

    /**
     * L'unité de vente du produit
     * @ORM\Column(type="string", length=80)
     */
    private $unity;

    /**
     * Méthode qui retourne l'identifiant du produit
     * @return int|null l'identifiant ou rien
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Méthode qui retourne le nom du produit
     * @return string|null le nom ou rien
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Méthode qui permet de modifier le nom du produit
     * @param string $name le nouveau nom
     * @return Product
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Méthode qui retourne le point de vente qui vend ce produit
     * @return Shop|null une instance de point de vente ou rien
     */
    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    /**
     * Méthode qui permet de changer le point de vente qui met en vente ce produit
     * @param Shop|null $shop la nouvelle instance de point de vente
     * @return Product
     */
    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Méthode qui retourne la quantité disponible de produit
     * @return int|null la quantité disponible ou rien
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Méthode qui permet de modifier la quantité disponible du produit
     * @param int $quantity la nouvelle quantité disponible du produit
     * @return Product
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Méthode qui retourne le prix d'une unité de produit
     * @return float|null le prix d'une unité de vente ou rien
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * Méthode qui permet de modifier le prix
     * @param float $price le nouveau prix d'une unité de vente
     * @return Product
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Méthode qui retourne la description du produit
     * @return string|null la description ou rien
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Méthode qui permet de modifier la description du produit
     * @param string $description la nouvelle description
     * @return Product
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Méthode qui retourne la catégorie du produit
     * @return Category|null une instance de catégorie du produit ou rien
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Méthode qui permet de modifier la catégorie du produit
     * @param Category|null $category la nouvelle instance de catégorie du produit ou rien
     * @return Product
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Méthode qui retourne le nom de l'image du produit
     * @return string|null le nom de l'image ou rien
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Méthode qui permet de modifier l'image du produit
     * @param string $image le nom de la nouvelle image
     * @return Product
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Méthode qui retourne l'unité de vente du produit
     * @return string|null l'unité de vente ou rien
     */
    public function getUnity(): ?string
    {
        return $this->unity;
    }

    /**
     * Méthode qui permet de modifer l'unité de vente du produit
     * @param string $unity la nouvelle unité de vente
     * @return Product
     */
    public function setUnity(string $unity): self
    {
        $this->unity = $unity;

        return $this;
    }
}
