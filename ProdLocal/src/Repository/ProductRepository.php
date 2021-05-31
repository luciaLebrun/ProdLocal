<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Le repository de la table Product
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    /**
     * Le constructeur de la classe
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }


    /**
     * Méthode qui renvoie les produits disponibles en vente du point de vente spécifié
     * @param int $id l'identifiant du point de vente
     * @return Product[] un tableau de produits disponible en vente du point de vente
     */
    public function findAvailableProductsWithCategory(int $id): array
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT P.name as name, P.quantity AS quantity, P.price AS price, P.description AS description, P.unity AS unity, C.id AS category, C.name AS catname, C.image AS catimage
                            FROM App\Entity\Product P, App\Entity\Category C
                            WHERE C.id = P.category
                                AND P.shop = :id
                                AND P.quantity > 0
                            ORDER BY P.name')
            ->setParameter('id', $id);
        return $query->getResult();
    }

    /**
     * Méthode qui renvoie les produits non disponible en vente du point de vente spécifié
     * @param int $id l'identifiant du point de vente
     * @return Product[] un tableau de produits non disponible en vente du point de vente
     */
    public function findNotAvailableProductsWithCategory(int $id): array
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT P.name as name, P.quantity AS quantity, P.price AS price, P.description AS description, P.unity AS unity, C.id AS categorie, C.name AS catname, C.image AS catimage
                            FROM App\Entity\Product P, App\Entity\Category C
                            WHERE C.id = P.category
                                AND P.shop = :id
                                AND P.quantity = 0
                            ORDER BY P.name')
            ->setParameter('id', $id);
        return $query->getResult();
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
