<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class AnimalCounter
{
    #[MongoDB\Id]
    private $id;

    #[MongoDB\Field(type: "string")]
    private $animalEntityId;

    #[MongoDB\Field(type: "string")]
    private $animalEntityName;

    #[MongoDB\Field(type: "int")]
    private $counter;

    public function __construct()
    {
        $this->counter = 0;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getAnimalEntityId(): ?string
    {
        return $this->animalEntityId;
    }

    public function setAnimalEntityId(string $animalEntityId): void
    {
        $this->animalEntityId = $animalEntityId;
    }

    public function getAnimalEntityName(): ?string
    {
        return $this->animalEntityName;
    }

    public function setAnimalEntityName(string $animalEntityName): void
    {
        $this->animalEntityName = $animalEntityName;
    }

    public function getCounter(): ?int
    {
        return $this->counter;
    }

    public function setCounter(int $counter): void
    {
        $this->counter = $counter;
    }
}
//