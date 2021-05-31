<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Les fixtures de la table Categorie sont créées dans cette classe.
 * @package App\DataFixtures
 */
class CategoryFixtures extends Fixture
{
    /**
     * Méthode qui créée des instances de la classe Category. On charge un jeu de donnée.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName("Fruits de mer")
            ->setImage("shell.png");
        $manager->persist($category);
        $this->addReference("shell", $category);

        $category = new Category();
        $category->setName("Fruits et légumes")
            ->setImage("fruits&veggies.png");
        $manager->persist($category);
        $this->addReference("fruits&veggies", $category);

        $category = new Category();
        $category->setName("Vins")
            ->setImage("wine.png");
        $manager->persist($category);
        $this->addReference("wine", $category);

        $category = new Category();
        $category->setName("Miel")
            ->setImage("honey.png");
        $manager->persist($category);
        $this->addReference("honey", $category);

        $manager->flush();
    }
}
