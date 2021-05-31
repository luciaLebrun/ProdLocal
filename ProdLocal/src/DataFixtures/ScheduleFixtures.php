<?php

namespace App\DataFixtures;

use App\Entity\Schedule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


/**
 * Les fixtures de la table Schedule sont créées dans cette classe.
 * @package App\DataFixtures
 */
class ScheduleFixtures extends Fixture
{
    /**
     * Méthode qui créé des instances de la classe Schedule. On charge un jeu de donnée.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $schedule = new Schedule();
        $schedule->setShop($this->getReference('shop1'))
            ->setOpeningDay(1)
            ->setClosingDay(6)
            ->setOpeningHour("10:00")
            ->setClosingHour("19:00");
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setShop($this->getReference('shop2'))
            ->setOpeningDay(1)
            ->setClosingDay(5)
            ->setOpeningHour("14:00")
            ->setClosingHour("19:00");
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setShop($this->getReference('shop2'))
            ->setOpeningDay(6)
            ->setClosingDay(6)
            ->setOpeningHour("10:00")
            ->setClosingHour("19:00");
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setShop($this->getReference('shop3'))
            ->setOpeningDay(2)
            ->setClosingDay(6)
            ->setOpeningHour("10:00")
            ->setClosingHour("17:00");
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setShop($this->getReference('shop4'))
            ->setOpeningDay(1)
            ->setClosingDay(7)
            ->setOpeningHour("14:00")
            ->setClosingHour("19:00");
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setShop($this->getReference('shop5'))
            ->setOpeningDay(1)
            ->setClosingDay(6)
            ->setOpeningHour("10:00")
            ->setClosingHour("19:00");
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setShop($this->getReference('shop5'))
            ->setOpeningDay(7)
            ->setClosingDay(7)
            ->setOpeningHour("10:00")
            ->setClosingHour("13:00");
        $manager->persist($schedule);

        $manager->flush();
    }
}
