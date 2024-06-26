<?php 

namespace App\Service;

use App\Entity\AnimalEntity;
use App\Document\AnimalLike;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ODM\MongoDB\DocumentManager;

class CountLikeService
{
    private $entityManager;
    private $documentManager;

    public function __construct(EntityManagerInterface $entityManager, DocumentManager $documentManager)
    {
        $this->entityManager = $entityManager;
        $this->documentManager = $documentManager;
    }

    public function likeAnimal(int $animalId): void
    {
        // Récupérer l'animal depuis MySQL
        $animal = $this->entityManager->getRepository(AnimalEntity::class)->find($animalId);

        if (!$animal) {
            throw new \Exception('Animal not found');
        }

        // Récupérer ou créer un document de likes pour l'animal dans MongoDB
        $animalLikes = $this->documentManager->getRepository(AnimalLike::class)->findOneBy(['name' => $animal->getName()]);

        if (!$animalLikes) {
            $animalLikes = new AnimalLike();
            $animalLikes->setName($animal->getName());
        }

        // Incrémenter le compteur de likes
        $animalLikes->incrementLikeCount();

        // Persister les modifications dans MongoDB
        $this->documentManager->persist($animalLikes);
        $this->documentManager->flush();
    }
}
