<?php

namespace App\Repository;

use App\Entity\CityInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CityInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CityInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CityInfo[]    findAll()
 * @method CityInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CityInfo::class);
    }

    // /**
    //  * @return CityInfo[] Returns an array of CityInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CityInfo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
