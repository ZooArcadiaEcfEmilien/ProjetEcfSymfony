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
    private $dm;
    private $em;

    public function __construct(DocumentManager $dm, EntityManagerInterface $em)
    {
        $this->dm = $dm;
        $this->em = $em;
    }

    public function getSubscribedEvents(): array
    {
        return [Events::postPersist];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $dm = $this->dm;
        $entity = $args->getObject();

        // Vérifiez si l'entité est de type AnimalEntity
        if (!$entity instanceof AnimalEntity) {
            return;
        }
        
        // Créez et persistez l'AnimalCounter
        $animalCounter = new AnimalCounter();
        $animalCounter->setAnimalEntityId($entity->getId());
        $animalCounter->setAnimalEntityName($entity->getName());
        $animalCounter->setCounter(0);
        
        $dm->persist($animalCounter);
        $dm->flush();
        
        // Associez l'AnimalCounter à l'AnimalEntity
        $entity->setAnimalCounter($animalCounter);
}
}