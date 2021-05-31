<?php

namespace App\Repository;

use App\Entity\Shop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Le repository de la classe Shop
 * @method Shop|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shop|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shop[]    findAll()
 * @method Shop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopRepository extends ServiceEntityRepository
{
    /**
     * Le constructeur de la classe
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shop::class);
    }

    /**
     * Méthode qui trouve l'image du catégorie de produits en vente pour chaque point de vente
     * @return Shop[] un tableau de catégories de produit
     */
    public function findCategoryOfEachShop(): array
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT DISTINCT S.id AS shop, C.image AS image
                            FROM App\Entity\Shop S, App\Entity\Product P, App\Entity\Category C
                            WHERE P.shop = S.id
                                AND C.id = P.category');
        return $query->getResult();
    }

    // /**
    //  * @return Shop[] Returns an array of Shop objects
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
    public function findOneBySomeField($value): ?Shop
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function listeShops(): iterable
    {
        return $this->findAll();
    }
}
