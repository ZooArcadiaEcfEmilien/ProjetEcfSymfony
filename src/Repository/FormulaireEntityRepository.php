<?php

namespace App\Repository;

use App\Entity\FormulaireEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormulaireEntity>
 *
 * @method FormulaireEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormulaireEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormulaireEntity[]    findAll()
 * @method FormulaireEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormulaireEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormulaireEntity::class);
    }

    //    /**
    //     * @return FormulaireEntity[] Returns an array of FormulaireEntity objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FormulaireEntity
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
