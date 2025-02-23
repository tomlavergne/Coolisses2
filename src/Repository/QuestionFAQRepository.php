<?php

namespace App\Repository;

use App\Entity\QuestionFAQ;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuestionFAQ>
 *
 * @method QuestionFAQ|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionFAQ|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionFAQ[]    findAll()
 * @method QuestionFAQ[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionFAQRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionFAQ::class);
    }

//    /**
//     * @return QuestionFAQ[] Returns an array of QuestionFAQ objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QuestionFAQ
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
