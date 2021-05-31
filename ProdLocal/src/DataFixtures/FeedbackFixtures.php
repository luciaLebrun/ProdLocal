<?php

namespace App\DataFixtures;

use App\Entity\Feedback;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Les fixtures de la table Feedback sont créées dans cette classe.
 * @package App\DataFixtures
 */
class FeedbackFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Méthode qui créé des instances de la classe Feedback. On charge un jeu de donnée.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $Date = '10/12/2020';

        $feedback = new Feedback();
        $feedback->setAuthor("Jimmy Random")
            ->setText("Leurs huitres sont excellentes, j'ai pu acheté une dizaine de kilogramme pendant les fêtes ! Le producteur est toujours ouvert à la négociation seulement si vous achetez une grande quantité !")
            ->setDate(new \DateTime())
            ->setRate(5)
            ->setShop($this->getReference('shop1'));
        $manager->persist($feedback);

        $feedback = new Feedback();
        $feedback->setAuthor("Jean Dupont")
            ->setText("Les producteurs sont très sympas, ils m'ont laissés la possibilité de pêcher moi-même les palourdes. Je recommande !")
            ->setDate(new \DateTime())
            ->setRate(5)
            ->setShop($this->getReference('shop1'));
        $manager->persist($feedback);

        $feedback = new Feedback();
        $feedback->setAuthor("Jean Martin")
            ->setText("Degustation sur place correct, la carte de vins pour accompagner leurs produits y est limitée...")
            ->setDate(new \DateTime())
            ->setRate(4)
            ->setShop($this->getReference('shop1'));
        $manager->persist($feedback);

        $feedback = new Feedback();
        $feedback->setAuthor("Laurent Dupont")
            ->setText("Le sommelier est très expérimenté. Il saura répondre à vos besoins.")
            ->setDate(new \DateTime())
            ->setRate(5)
            ->setShop($this->getReference('shop2'));
        $manager->persist($feedback);

        $feedback = new Feedback();
        $feedback->setAuthor("Julie Chartron")
            ->setText("Je n'ai pas pu trouvé le vin que je cherchais mais le sommelier a pu me conseiller une alternative. Je préfère l'original.")
            ->setDate(new \DateTime())
            ->setRate(3)
            ->setShop($this->getReference('shop2'));
        $manager->persist($feedback);

        $feedback = new Feedback();
        $feedback->setAuthor("Jimmy Random")
            ->setText("Manque de personnel pendant la période de fêtes, j'ai dû attendre presque une heure avant que quelqu'un vienne m'aider à choisir un vin...")
            ->setDate(new \DateTime())
            ->setRate(3)
            ->setShop($this->getReference('shop2'));
        $manager->persist($feedback);

        $feedback = new Feedback();
        $feedback->setAuthor("Nina Vandetta")
            ->setText("Large choix de miels, je recommande !")
            ->setDate(new \DateTime())
            ->setRate(5)
            ->setShop($this->getReference('shop3'));
        $manager->persist($feedback);

        $feedback = new Feedback();
        $feedback->setAuthor("Jimmy Random")
            ->setText("Les fraises fondent face à la chaleur, pensez à emmener un sac isotherme.")
            ->setDate(new \DateTime())
            ->setRate(2)
            ->setShop($this->getReference('shop4'));
        $manager->persist($feedback);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ShopFixtures::class,
        );
    }
}
