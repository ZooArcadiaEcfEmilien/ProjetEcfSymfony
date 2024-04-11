<?php

namespace App\Entity;

use App\Repository\AnimalEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalEntityRepository::class)]
#[ORM\Table(name: "animal")]

class AnimalEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private $name;

    #[ORM\Column(type: "string", length: 255)]
    private $race;

    #[ORM\Column(type: "text")]
    private ?string $image = null;

    #[ORM\ManyToOne(targetEntity: HabitatEntity::class, inversedBy: 'animaux')]
    private HabitatEntity $habitat;
    

    #[ORM\Column(type: "string", length: 255)]
    private ?string $etatAnimal = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nourritureType = null;

    #[ORM\Column(type: "integer", length: 10)]
    private ?int $nourritureQuantite = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $datePassage = null;

    #[ORM\Column(type: "text")]
    private ?string $detailsCommentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function createProperty($propertyName, $propertyValue){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod($propertyValue);
        }
    }

    public function readProperty($propertyName){
        $getterMethod = 'get' . ucfirst($propertyName);
        if (method_exists($this, $getterMethod)) {
            return $this->$getterMethod();
        }
        return null;
    }

    public function updateProperty($propertyName, $propertyValue){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod($propertyValue);
        }
    }

    public function deleteProperty($propertyName){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod(null);
        }
    }

}
