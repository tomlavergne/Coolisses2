<?php

namespace App\Repository;

use App\Entity\ArticleLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArticleLocation>
 *
 * @method ArticleLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleLocation[]    findAll()
 * @method ArticleLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleLocation::class);
    }

//    /**
//     * @return ArticleLocation[] Returns an array of ArticleLocation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArticleLocation
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
