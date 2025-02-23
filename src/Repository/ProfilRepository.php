<?php

namespace App\Repository;

use App\Entity\Profil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Profil>
 *
 * @method Profil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profil[]    findAll()
 * @method Profil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profil::class);
    }

//    /**
//     * @return Profil[] Returns an array of Profil objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Profil
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }


    public function findByCriteria($filter): array
    {
        $qb =  $this->createQueryBuilder('p');
        if($filter !==null){
            if (isset($filter['metier'])) {
                $qb->innerJoin('p.metier', 'm');
            }
            if (isset($filter['langue'])) {
                $qb->innerJoin('p.langues', 'l');
            }
            if (isset($filter['metier'])) {
                $qb->andWhere('m.id = :metierId')->setParameter('metierId', $filter['metier']->getId());
            }
            if (isset($filter['experience'])) {
                $qb->andWhere('p.experience = :experienceId')->setParameter('experienceId', $filter['experience']);
            }
            if (isset($filter['langue'])) {
                $qb->andWhere('l.id = :langueId')->setParameter('langueId', $filter['langue']);
            }
            if (isset($filter['genre'])) {
                $qb->andWhere('p.genre = :genreId')->setParameter('genreId', $filter['genre']->getId());
            }
            if (isset($filter['agemin'])) {
                $birthdateMin = new \DateTime();
                $birthdateMin->modify('-' . $filter['agemin'] . ' years');
                $qb->andWhere('p.dateNaissance <= :birthdateMin')->setParameter('birthdateMin', $birthdateMin);
            }
            if (isset($filter['agemax'])) {
                $birthdateMax = new \DateTime();
                $birthdateMax->modify('-' . $filter['agemax'] . ' years');
                $qb->andWhere('p.dateNaissance >= :birthdateMax')->setParameter('birthdateMax', $birthdateMax);
            }
        }
        return $qb->orderBy('p.id', 'ASC')->getQuery()->getResult();
}
}
