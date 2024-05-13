<?php
namespace App\Service;

use App\Entity\AnimalEntity;
use App\Entity\HabitatEntity;
use Doctrine\ORM\EntityManagerInterface;

class AnimalCrud
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}





