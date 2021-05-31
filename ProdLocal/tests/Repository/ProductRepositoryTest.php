<?php

namespace App\Tests\Repository;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class ProductRepositoryTest
 * @package App\Tests\Repository
 */
class ProductRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testFindAvailableProductsWithCategory()
    {
        $shops = $this->entityManager
            ->getRepository(Product::class)
            ->findAvailableProductsWithCategory(3)
        ;

        $this->assertCount(2, $shops);
    }

    public function testFindNotAvailableProductsWithCategory()
    {
        $shops = $this->entityManager
            ->getRepository(Product::class)
            ->findNotAvailableProductsWithCategory(3)
        ;

        $this->assertCount(1, $shops);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
