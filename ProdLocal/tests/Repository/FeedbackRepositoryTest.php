<?php

namespace App\Tests\Repository;

use App\Entity\Feedback;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FeedbackRepositoryTest extends KernelTestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testFindAVGRateOfAShop()
    {
        $rate = $this->entityManager
            ->getRepository(Feedback::class)
            ->findAVGRateOfAShop(3)
        ;

        $this->assertSame('5.0000', $rate['shoprate']);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
