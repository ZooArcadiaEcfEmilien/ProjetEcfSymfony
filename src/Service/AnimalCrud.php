<?php
namespace App\Service;

use App\Entity\AnimalEntity;
use App\Entity\HabitatEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ODM\MongoDB\DocumentManager;

class AnimalCrud
{
    private $entityManager;
    private $documentManager;

    public function __construct(EntityManagerInterface $entityManager, DocumentManager $documentManager)
    {
        $this->entityManager = $entityManager;
        $this->documentManager = $documentManager;
    }
}





