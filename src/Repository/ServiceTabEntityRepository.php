<?php

namespace App\Repository;

use App\Entity\ServiceTabEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServiceTabEntity>
 *
 * @method ServiceTabEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceTabEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceTabEntity[]    findAll()
 * @method ServiceTabEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceTabEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceTabEntity::class);
    }

    //    /**
    //     * @return ServiceTabEntity[] Returns an array of ServiceTabEntity objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ServiceTabEntity
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
