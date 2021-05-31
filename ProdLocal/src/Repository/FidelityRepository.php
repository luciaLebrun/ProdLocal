<?php

namespace App\Repository;

use App\Entity\Fidelity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fidelity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fidelity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fidelity[]    findAll()
 * @method Fidelity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FidelityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fidelity::class);
    }

    // /**
    //  * @return Fidelity[] Returns an array of Fidelity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fidelity
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
