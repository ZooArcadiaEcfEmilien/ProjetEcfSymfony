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
    
    #[ORM\Column(type: "string", length: 255)]
    private ?string $etatAnimal = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nourritureType = null;

    #[ORM\Column(type: "integer", length: 10)]
    private ?int $nourritureQuantite = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $datePassage = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $detailsCommentaire = null;

    #[ORM\ManyToOne(inversedBy: 'animalEntities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?HabitatEntity $habitatDeLAnimal = null;

    // METHODES

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setRace(string $race): void
    {
        $this->race = $race;
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function setEtatAnimal(string $etatAnimal): void
    {
        $this->etatAnimal = $etatAnimal;
    }
    public function setnourritureType(?string $nourritureType): void
    {
        $this->nourritureType = $nourritureType;
    }
    public function setnourritureQuantite(?int $nourritureQuantite): void
    {
        $this->nourritureQuantite = $nourritureQuantite;
    }
    
    public function setdatePassage(?\DateTimeInterface $datePassage): void
    {
        $this->datePassage = $datePassage;
    }

    public function setDetailsCommentaire (?string $detailsCommentaire): void
    {
        $this->detailsCommentaire = $detailsCommentaire;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getRace(): ?string
    {
        return $this->race;
    }
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getEtatAnimal(): ?string
    {
        return $this->etatAnimal;
    }
    public function getNourritureType(): ?string
    {
        return $this->nourritureType;
    }
    public function getNourritureQuantite(): ?int
    {
        return $this->nourritureQuantite;
    }
    public function getDatePassage(): ?\DateTimeInterface
    {
        return $this->datePassage;
    }
    public function getDetailsCommentaire(): ?string
    {
        return $this->detailsCommentaire;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getHabitatDeLAnimal(): ?HabitatEntity
    {
        return $this->habitatDeLAnimal;
    }

    public function setHabitatDeLAnimal(?HabitatEntity $habitatDeLAnimal): static
    {
        $this->habitatDeLAnimal = $habitatDeLAnimal;

        return $this;
    }   
}