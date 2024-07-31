<?php

namespace App\Repository;

use App\Entity\StatistiqueEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StatistiqueEntity>
 *
 * @method StatistiqueEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatistiqueEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatistiqueEntity[]    findAll()
 * @method StatistiqueEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatistiqueEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatistiqueEntity::class);
    }
}
