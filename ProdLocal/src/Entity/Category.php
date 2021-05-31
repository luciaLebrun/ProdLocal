<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Les instances de cette classe représentent chacune, une catégorie de produit d'un produit.
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * L'identifiant de la catégorie de produit
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Le nom de la catégorie de produit
     * @ORM\Column(type="string", length=80)
     */
    private $name;

    /**
     * Le nom de l'image représentant la catégorie de produit
     * @ORM\Column(type="string", length=80)
     */
    private $image;

    /**
     * Les produits qui appartiennent à cette catégorie de produit
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="category")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * Méthode qui retourne l'identifiant de la catégorie de produit
     * @return int|null l'identifiant de la catégorie de produit ou rien
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Méthode qui retourne le nom de la catégorie du produit
     * @return string|null le nom de la catégorie de produit ou rien
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Méthode qui permet de modifier le nom de la catégorie de produit
     * @param string $name le nouveau nom de la catégorie de produit
     * @return Category
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Méthode qui retourne le nom de l'image représentant la catégorie de produit
     * @return string|null le nom de l'image de la catégorie de produit ou rien
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Méthode qui permet de modifier l'image représentant le catégorie de produit
     * @param string $image le nom de la nouvelle image de la catégorie de produit
     * @return Category
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Méthode qui retourne les produits qui appartiennent à cette catégorie de produit
     * @return Collection|Product[] une collection de produits qui appartiennent à cette catégorie de produit
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * Méthode qui permet d'ajouter un produit de cette catégorie de produit
     * @param Product $product un produit de cette catégorie de produit
     * @return Category
     */
    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategory($this);
        }

        return $this;
    }

    /**
     * Méthode qui permet de supprimer un produit de cette catégorie
     * @param Product $product un produit à retirer de cette catégorie de produit
     * @return Category
     */
    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }
}
