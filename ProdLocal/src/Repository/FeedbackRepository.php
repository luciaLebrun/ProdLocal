<?php

namespace App\Repository;

use App\Entity\Feedback;
use App\Entity\Shop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Le repository de la classe Feedback.
 * @method Feedback|null find($id, $lockMode = null, $lockVersion = null)
 * @method Feedback|null findOneBy(array $criteria, array $orderBy = null)
 * @method Feedback[]    findAll()
 * @method Feedback[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeedbackRepository extends ServiceEntityRepository
{
    /**
     * Le constructeur de la classe
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Feedback::class);
    }

    /**
     * Méthode qui calcule la note moyenne du point de vente spécifié
     * @param int $idShop le point de vente
     * @return array|null la note moyenne des clients du point de vente dans la colonne shoprate du tableau
     * @throws NonUniqueResultException
     */
    public function findAVGRateOfAShop(int $idShop): ?array
    {
        $query = $this->createQueryBuilder('f')
            ->select('AVG(f.rate) AS shoprate')
            ->andWhere('f.shop = :shop')
            ->setParameter('shop', $idShop)
            ->getQuery();
        return $query->getOneOrNullResult();
    }

    // /**
    //  * @return Feedback[] Returns an array of Feedback objects
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
    public function findOneBySomeField($value): ?Feedback
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
