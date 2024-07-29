<?php

namespace App\Listeners;

use App\Entity\AnimalEntity;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Document\AnimalCounter;
use Doctrine\Common\EventSubscriber;

class MyEventSubscriber implements EventSubscriber
{
    private $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function getSubscribedEvents()
    {
        return ['postPersist'];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof AnimalEntity) {
            return;
        }

        $animalCounter = $this->createAnimalCounter($entity);
        $this->dm->persist($animalCounter);
        $this->dm->flush();

        $entity->setAnimalCounter($animalCounter);

        // Update AnimalEntity to persist the animalCounterId
        $em = $args->getObjectManager();
        $em->persist($entity);
        $em->flush();
    }

    private function createAnimalCounter(AnimalEntity $entity): AnimalCounter
    {
        $animalCounter = new AnimalCounter();
        $animalCounter->setAnimalEntityId($entity->getId());
        $animalCounter->setAnimalEntityName($entity->getName());
        $animalCounter->setCounter(0);

        return $animalCounter;
    }
}
