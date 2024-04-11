<?php

namespace App\Repository;

use App\Entity\UserTabEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserTabEntity>
 *
 * @method UserTabEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserTabEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserTabEntity[]    findAll()
 * @method UserTabEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTabEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserTabEntity::class);
    }

    //    /**
    //     * @return UserTabEntity[] Returns an array of UserTabEntity objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?UserTabEntity
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
