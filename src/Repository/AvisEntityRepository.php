<?php

namespace App\Repository;

use App\Entity\AvisEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvisEntity>
 *
 * @method AvisEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvisEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvisEntity[]    findAll()
 * @method AvisEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvisEntity::class);
    }
}
