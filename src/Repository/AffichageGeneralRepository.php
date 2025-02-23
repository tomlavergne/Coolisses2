<?php

namespace App\Repository;

use App\Entity\AffichageGeneral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AffichageGeneral>
 *
 * @method AffichageGeneral|null find($id, $lockMode = null, $lockVersion = null)
 * @method AffichageGeneral|null findOneBy(array $criteria, array $orderBy = null)
 * @method AffichageGeneral[]    findAll()
 * @method AffichageGeneral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffichageGeneralRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AffichageGeneral::class);
    }

    //    /**
    //     * @return AffichageGeneral[] Returns an array of AffichageGeneral objects
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

    //    public function findOneBySomeField($value): ?AffichageGeneral
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
