<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ProdLocalControllerTest
 * @package App\Tests\Controller
 */
class ProdLocalControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html body div div div h2', 'Qui sommes-nous?');
    }

    public function testShopDetail()
    {
        $client = static::createClient();

        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('admin@mail.com');
        $client->loginUser($testUser);

        $client->request('GET', '/shop/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html body div div div h2', 'La Ferme Des Baleines');

        $this->assertSelectorTextContains('html body div div div div div div h5', 'Fidélité');
    }

    public function testFeedbacks()
    {
        $client = static::createClient();

        $client->request('GET', '/shop/1/feedbacks');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html body div div div a h2', 'La Ferme Des Baleines');
    }
}
