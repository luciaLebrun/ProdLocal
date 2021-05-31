<?php

namespace App\Repository;

use App\Entity\Schedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Le repository de la classe Schedule
 * @method Schedule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schedule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schedule[]    findAll()
 * @method Schedule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScheduleRepository extends ServiceEntityRepository
{
    /**
     * Le constructeur de la classe
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schedule::class);
    }

    /**
     * Méthode qui renvoie les horaires d'ouvertures ordonnés du point de vente spécifié
     * @param int $shop le point de vente
     * @return int|mixed|string un tableau d'horaires d'ouverture du point de vente ordonné par l'heure d'ouverture
     */
    public function findSchedulesByShopIdSortedByOpeningHour(int $shop){
        return $this->createQueryBuilder('s')
            ->andWhere('s.shop = :shop')
            ->setParameter('shop', $shop)
            ->orderBy('s.opening_hour', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Schedule[] Returns an array of Schedule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Schedule
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
