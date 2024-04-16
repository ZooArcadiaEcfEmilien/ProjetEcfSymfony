<?php

namespace App\Entity;

use App\Repository\HabitatEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatEntityRepository::class)]
#[ORM\Table(name: "habitat")]

class HabitatEntity 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:"string")]
    private $habitatType;

    #[ORM\Column(type:"string")]
    private $habitatNom;

    #[ORM\Column(type:"string")]
    private $habitatDescription;

    #[ORM\Column(type:"text")]
    private ?string $habitatImage = null;

    #[ORM\OneToMany(mappedBy: 'habitat', targetEntity: AnimalEntity::class)]
    private Collection $animaux;

    public function getId(): ?int
    {
        return $this->id;
    }
}
