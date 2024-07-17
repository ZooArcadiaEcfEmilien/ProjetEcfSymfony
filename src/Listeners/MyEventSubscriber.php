<?php

namespace App\Listeners;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Entity\AnimalEntity;
use App\Document\AnimalCounter;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;

class MyEventSubscriber implements EventSubscriber
{
    private $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function getSubscribedEvents()
    {
        return [Events::postPersist];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof AnimalEntity) {
            return;
        }

        // Créer et persister un nouveau AnimalCounter
        $animalCounter = new AnimalCounter();
        $animalCounter->setAnimalEntityId($entity->getId());
        $animalCounter->setAnimalEntityName($entity->getName());
        $animalCounter->setCounter(0);

        $this->dm->persist($animalCounter);
        $this->dm->flush();

        // Associer AnimalCounter à AnimalEntity
        $entity->setAnimalCounter($animalCounter);
    }
}
