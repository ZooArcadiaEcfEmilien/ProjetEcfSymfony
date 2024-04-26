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

    #[ORM\Column(type:"string")]
    private $habitatNom;

    #[ORM\Column(type:"string")]
    private $habitatDescription;

    #[ORM\Column(type:"string")]
    private ?string $habitatImage = null;

    #[ORM\OneToMany(mappedBy: 'habitat', targetEntity: AnimalEntity::class)]
    private Collection $animaux;

    /*public function __construct()
    {
        $this->animaux = new ArrayCollection();
    }*/

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

    public function getAnimaux(): Collection
    {
        return $this->animaux;
    }

   /* public function setAnimaux(Collection $animaux): void
    {
        $this->animaux = $animaux;
    }*/

    public function getHabitatImage(): ?string
    {
        return $this->habitatImage;
    }

    public function setHabitatImage(string $habitatImage): void
    {
        $this->habitatImage = $habitatImage;
    }
    public function __toString(): string
    {
        return $this->habitatNom; 
    }
}