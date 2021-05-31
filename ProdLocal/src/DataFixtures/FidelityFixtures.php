<?php

namespace App\DataFixtures;

use App\Entity\Fidelity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class FidelityFixtures
 * @package App\DataFixtures
 */
class FidelityFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $fidelity = new Fidelity();
        $fidelity->setUser($this->getReference('user1'));
        $fidelity->setShop($this->getReference('shop1'));
        $fidelity->setPoints(1000);
        $manager->persist($fidelity);

        $fidelity = new Fidelity();
        $fidelity->setUser($this->getReference('user1'));
        $fidelity->setShop($this->getReference('shop2'));
        $fidelity->setPoints(500);
        $manager->persist($fidelity);

        $fidelity = new Fidelity();
        $fidelity->setUser($this->getReference('user1'));
        $fidelity->setShop($this->getReference('shop3'));
        $fidelity->setPoints(250);
        $manager->persist($fidelity);

        $fidelity = new Fidelity();
        $fidelity->setUser($this->getReference('user1'));
        $fidelity->setShop($this->getReference('shop4'));
        $fidelity->setPoints(125);
        $manager->persist($fidelity);

        $fidelity = new Fidelity();
        $fidelity->setUser($this->getReference('user1'));
        $fidelity->setShop($this->getReference('shop5'));
        $fidelity->setPoints(0);
        $manager->persist($fidelity);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ShopFixtures::class,
            UserFixtures::class,
        );
    }
}