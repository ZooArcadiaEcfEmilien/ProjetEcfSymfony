<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
echo"DOCUMENT_ANIMALCOUNTER \n";
/**
 * @MongoDB\Document
 * @MongoDB\Table(name="animal_counter")
 */
class AnimalCounter
{
    /** @MongoDB\Id */
    private $id;

    /** @MongoDB\Field(type="string") */
    private $animalEntityId;

    /** @MongoDB\Field(type="string") */
    private $animalEntityName;

    /** @MongoDB\Field(type="int") */
    private $counter;

    public function __construct()
    {

        $this->counter = 0;
    }

    public function getId(): ?string
    {
        echo"DOCUMENT_ANIMALCOUNTER  : GET ID \n";
        return $this->id;
    }

    public function getAnimalEntityId(): ?string
    {
        echo "AnimalCounter DOC : getAnimalEntityID \n";
        return $this->animalEntityId;
    }

    public function setAnimalEntityId($animalEntityId): void
    {
        echo "AnimalCounter DOC : setAnimalEntityId \n";
        $this->animalEntityId = $animalEntityId;
    }

    public function getAnimalEntityName(): ?string
    {
        echo "AnimalCounter DOC : getAnimalEntityName \n";
        return $this->animalEntityName;
    }

    public function setAnimalEntityName(string $animalEntityName): void
    {
        echo "AnimalCounter DOC : setAnimalEntityName \n";
        $this->animalEntityName = $animalEntityName;
    }

    public function getCounter(): ?int
    {
        echo "AnimalCounter DOC : getCounter \n";
        return $this->counter;
    }

    public function setCounter(int $counter): void
    {
        echo "AnimalCounter DOC : setCounter \n";
        $this->counter = $counter;
    }
}
