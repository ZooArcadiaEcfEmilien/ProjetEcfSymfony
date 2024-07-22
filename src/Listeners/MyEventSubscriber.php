<?php

namespace App\Listeners;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use App\Entity\AnimalEntity;
use App\Document\AnimalCounter;
use Doctrine\Common\EventSubscriber;



class MyEventSubscriber implements EventSubscriber
{
    private $dm;
    private $em;

    public function __construct(DocumentManager $dm, \Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->dm = $dm;
        $this->em = $em;
    }

    public function getSubscribedEvents(): array
    {
        echo"MyEventSubscriber : getSubscribedEvents \n";

        return [Events::postPersist];
        
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        echo"MyEventSubscriber : postPersist \n";
        $entity = $args->getObject();

        // Vérifiez si l'entité est de type AnimalEntity
        if (!$entity instanceof AnimalEntity) {
            return;
        }

        // Créez et persistez l'AnimalCounter
        $animalCounter = new AnimalCounter();
        echo"MyEventSubscriber  : AnimalCounter created \n";

        $animalCounter->setAnimalEntityId($entity->getId());
        $animalCounter->setAnimalEntityName($entity->getName());

        $this->dm->persist($animalCounter);
        $this->dm->flush();

        echo "MyEventSubscriber : AnimalCounter persisted \n";
        // Associez l'AnimalCounter à l'AnimalEntity
        //$entity->setAnimalCounter($animalCounter);
        //$this->em->persist($entity);
        //$this->em->flush();
    }
}
