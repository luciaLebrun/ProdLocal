<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Les fixtures de la table Product sont créées dans cette classe.
 * @package App\DataFixtures
 */
class ProductFixtures extends Fixture
{
    /**
     * Méthode qui créé des instances de la classe Product. On charge un jeu de donnée.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $products = new Product();
        $products->setShop($this->getReference('shop1'))
            ->setCategory($this->getReference('shell'))
            ->setName("Palourde")
            ->setQuantity(20)
            ->setPrice(7.80)
            ->setDescription("Venez pêcher vous-même vos palourdes ! Disponible aussi dans des paniers.")
            ->setImage("palourde.png")
            ->setUnity("kg");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop1'))
            ->setCategory($this->getReference('shell'))
            ->setName("Huitre")
            ->setQuantity(20)
            ->setPrice(6.00)
            ->setDescription("Venez savourer nos huitres dans nos parcs maritimes !")
            ->setImage("huitre.png")
            ->setUnity("lot de 13");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop2'))
            ->setCategory($this->getReference('wine'))
            ->setName("Domaine Lavallée")
            ->setQuantity(12)
            ->setPrice(9.49)
            ->setDescription("Côtes d'Auxerre - AOC - 2017")
            ->setImage("DL2017.png")
            ->setUnity("bouteille de 0.75L");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop3'))
            ->setCategory($this->getReference('honey'))
            ->setName("Miel Fleurs d'Eté")
            ->setQuantity(0)
            ->setPrice(6.00)
            ->setDescription(" ")
            ->setImage("MielFE.png")
            ->setUnity("unité (500g)");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop3'))
            ->setCategory($this->getReference('honey'))
            ->setName("Miel d'Acacia")
            ->setQuantity(15)
            ->setPrice(9.00)
            ->setDescription(" ")
            ->setImage("MielA.png")
            ->setUnity("unité (500g)");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop3'))
            ->setCategory($this->getReference('honey'))
            ->setName("Gelée Royale")
            ->setQuantity(7)
            ->setPrice(21.00)
            ->setDescription(" ")
            ->setImage("MielA.png")
            ->setUnity("unité (10g)");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop4'))
            ->setCategory($this->getReference('fruits&veggies'))
            ->setName("Framboise")
            ->setQuantity(25)
            ->setPrice(12.99)
            ->setImage("framboise.png")
            ->setUnity("kg");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop4'))
            ->setCategory($this->getReference('fruits&veggies'))
            ->setName("Fraise")
            ->setQuantity(0)
            ->setPrice(7.99)
            ->setImage("fraise.png")
            ->setUnity("kg");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop4'))
            ->setCategory($this->getReference('fruits&veggies'))
            ->setName("Mûre")
            ->setQuantity(0)
            ->setPrice(12.99)
            ->setImage("mure.png")
            ->setUnity("kg");
        $manager->persist($products);

        $products = new Product();
        $products->setShop($this->getReference('shop4'))
            ->setCategory($this->getReference('fruits&veggies'))
            ->setName("Pomme")
            ->setQuantity(53)
            ->setPrice(3.99)
            ->setDescription("Ceci est une Pomme Bio!")
            ->setImage("pomme.png")
            ->setUnity("kg");
        $manager->persist($products);

        $manager->flush();
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return array(
            ShopFixtures::class,
        );
    }
}
