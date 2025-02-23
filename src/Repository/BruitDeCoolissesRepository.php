<?php

namespace App\Repository;

use App\Entity\BruitDeCoolisses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BruitDeCoolisses>
 *
 * @method BruitDeCoolisses|null find($id, $lockMode = null, $lockVersion = null)
 * @method BruitDeCoolisses|null findOneBy(array $criteria, array $orderBy = null)
 * @method BruitDeCoolisses[]    findAll()
 * @method BruitDeCoolisses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BruitDeCoolissesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BruitDeCoolisses::class);
    }

    public function findAllOrderedByDate()
    {
        return $this->createQueryBuilder('b')
            ->orderBy('b.date', 'DESC') // Tri par date dans l'ordre descendant
            ->getQuery()
            ->getResult();
    }
//    /**
//     * @return BruitDeCoolisses[] Returns an array of BruitDeCoolisses objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BruitDeCoolisses
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
