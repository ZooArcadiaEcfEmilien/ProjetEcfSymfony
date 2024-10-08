<?php

namespace App\Entity;
use App\Entity\AnimalEntity;
use App\Repository\HabitatEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: HabitatEntityRepository::class)]
#[ORM\Table(name: "habitat")]

class HabitatEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    private $habitatNom;

    #[ORM\Column(type: "text")]
    private $habitatDescription;

    #[ORM\Column(type: "text")]
    private ?string $habitatImage = null;

    /**
     * @var Collection<int, AnimalEntity>
     */
    #[ORM\OneToMany(targetEntity: AnimalEntity::class, mappedBy: 'habitatDeLAnimal')]
    private Collection $animalEntities;

    public function __construct()
    {
        $this->animalEntities = new ArrayCollection();
    }

    // GETTERs & SETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHabitatNom(): string
    {
        return $this->habitatNom;
    }

    public function setHabitatNom(string $habitatNom): void
    {
        $this->habitatNom = $habitatNom;
    }

    public function getHabitatDescription(): string
    {
        return $this->habitatDescription;
    }

    public function setHabitatDescription(string $habitatDescription): void
    {
        $this->habitatDescription = $habitatDescription;
    }

    public function getHabitatImage(): ?string
    {
        return $this->habitatImage;
    }

    public function setHabitatImage(?string $habitatImage): void
    {
        $this->habitatImage = '/uploads/images/Habitats/' . $habitatImage;
    }

    public function __toString(): string
    {
        return $this->habitatNom;
    }

    /**
     * @return Collection<int, AnimalEntity>
     */
    public function getAnimalEntities(): Collection
    {
        return $this->animalEntities;
    }

    public function addAnimalEntity(AnimalEntity $animalEntity): static
    {
        if (!$this->animalEntities->contains($animalEntity)) {
            $this->animalEntities->add($animalEntity);
            $animalEntity->setHabitatDeLAnimal($this);
        }

        return $this;
    }

    public function removeAnimalEntity(AnimalEntity $animalEntity): static
    {
        if ($this->animalEntities->removeElement($animalEntity)) {
            if ($animalEntity->getHabitatDeLAnimal() === $this) {
                $animalEntity->setHabitatDeLAnimal(null);
            }
        }

        return $this;
    }
}