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

  /*  public function addAnimal(string $name, string $race, HabitatEntity $habitat, \DateTime $dateTime, ?String $detailsCommentaire, string $etatAnimal, int $nourritureQuantite, string $nourritureType): void
    {
        $animal = new AnimalEntity();
        $animal->setName($name);
        $animal->setRace($race);
        $animal->setHabitatNom($habitat);
        $animal->setdatePassage($dateTime);
        $animal->setDetailsCommentaire($detailsCommentaire);
        $animal->setEtatAnimal($etatAnimal);
        $animal->setnourritureQuantite($nourritureQuantite);
        $animal->setnourritureType($nourritureType);

        $this->entityManager->persist($animal);
        $this->entityManager->flush();
    }*/
}





