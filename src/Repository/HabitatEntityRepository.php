<?php

namespace App\Repository;

use App\Entity\HabitatEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HabitatEntity>
 *
 * @method HabitatEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method HabitatEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method HabitatEntity[]    findAll()
 * @method HabitatEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HabitatEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HabitatEntity::class);
    }
}
