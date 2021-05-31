<?php

namespace App\Tests\Repository;

use App\Entity\Schedule;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class ScheduleRepositoryTest
 * @package App\Tests\Repository
 */
class ScheduleRepositoryTest extends KernelTestCase
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

    public function testFindSchedulesByShopIdSortedByOpeningHour()
    {
        $schedules = $this->entityManager
            ->getRepository(Schedule::class)
            ->findSchedulesByShopIdSortedByOpeningHour(3)
        ;

        $this->assertCount(1, $schedules);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
