<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Les fixtures de la table User sont créées dans cette classe.
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * Méthode qui créé des instances de la classe User. On charge un jeu de donnée.
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@mail.com');

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        $this->addReference("user1",$user);

        $manager->flush();
    }
}