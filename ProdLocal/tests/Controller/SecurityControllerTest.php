<?php


namespace App\Tests\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class SecurityControllerTest
 * @package App\Tests\Controller
 */
class SecurityControllerTest extends WebTestCase
{
    public function testInscriptionRoute()
    {
        $client = static::createClient();

        $client->request('GET', '/inscription');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testConnexionRoute()
    {
        $client = static::createClient();

        $client->request('GET', '/connexion');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLogin()
    {
        $client = static::createClient();

        $userRepository = static::$container->get(UserRepository::class);

        $testUser = $userRepository->findOneByEmail('admin@mail.com');

        $client->loginUser($testUser);

        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    public function testDeconnexionRoute()
    {
        $client = static::createClient();
        $client->followRedirects();

        $userRepository = static::$container->get(UserRepository::class);

        $testUser = $userRepository->findOneByEmail('admin@mail.com');

        $client->loginUser($testUser);

        $client->request('GET', '/deconnexion');
        $this->assertResponseIsSuccessful();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


}