<?php

namespace App\Listeners;

use App\Entity\AnimalEntity;
use App\Entity\HabitatEntity;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use App\Document\AnimalCounter;
use Doctrine\Common\EventSubscriber;

class MyEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            'postPersist',
        ];
    }
    
    private $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        // Vérifiez si l'entité est de type AnimalEntity
        if (!$entity instanceof AnimalEntity) {
            return;
        }

        // Créez et persistez l'AnimalCounter
        $animalCounter = $this->createAnimalCounter($entity);

        // Persister et flusher dans une transaction pour plus de sécurité
        $this->dm->persist($animalCounter);
        $this->dm->flush();

        // Associez l'AnimalCounter à l'AnimalEntity
        $entity->setAnimalCounter($animalCounter);
        $this->dm->flush();
    }

    private function createAnimalCounter(AnimalEntity $entity): AnimalCounter
    {
        $animalCounter = new AnimalCounter();
        $animalCounter->setAnimalEntityId($entity->getId());
        $animalCounter->setAnimalEntityName($entity->getName());
        $animalCounter->setCounter(0);
        $entity->setAnimalCounter($animalCounter);

        return $animalCounter;
    }
}