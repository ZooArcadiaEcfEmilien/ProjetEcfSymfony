<?php
// src/Document/AnimalCounter.php
namespace App\Document;

use App\Controller\HabitatController;
use App\Entity\HabitatEntity;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use App\Entity\AnimalEntity; // Import de l'entité AnimalEntity

/**
 * @MongoDB\Document
 */
class AnimalCounter
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $idAnimal;

    /**
     * @MongoDB\Field(type="string")
     */
    private $animalName;


    /**
     * @MongoDB\Field(type="int")
     */
    private $counterLike;

    // Getters and Setters

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getIdAnimal(): ?string
    {
        return $this->idAnimal;
    }

    public function setIdAnimal(AnimalEntity $animalEntity): self
    {
        $this->idAnimal = $animalEntity->getId();

        return $this;
    }

    public function getAnimalName(): ?string
    {
        return $this->animalName;
    }

    public function setAnimalName(AnimalEntity $animalEntity): self
    {
        $this->animalName = $animalEntity->getName();

        return $this;
    }

    public function getCounterLike(): ?int
    {
        return $this->counterLike;
    }

    public function setCounterLike(int $counterLike): self
    {
        $this->counterLike = $counterLike;

        return $this;
    }
}
// Exemple d'utilisation
echo"test";
$animalEntity = new AnimalEntity();
$animalEntity->setName("Chien");
$animalEntity->setdatePassage(new \DateTime("2021-01-01"));
$animalEntity->setDetailsCommentaire("Un chien très gentil");
$animalEntity->setEtatAnimal("En bonne santé");
$animalEntity->setImage("chien.jpg");


$animalCounter = new AnimalCounter();
$animalCounter->setIdAnimal($animalEntity);
$animalCounter->setAnimalName($animalEntity);

echo $animalCounter->getAnimalName();  // Affiche "Chien"
echo $animalCounter->getIdAnimal();    // Affiche "1" (en tant que chaîne, selon votre annotation)
