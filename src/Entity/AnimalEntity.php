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
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private string $name;

    #[ORM\Column(type: "string", length: 255)]
    private string $race;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $etatAnimal = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $nourritureType = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $nourritureQuantite = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $datePassage = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $detailsCommentaire = null;

    #[ORM\ManyToOne(inversedBy: "animalEntities")]
    #[ORM\JoinColumn(nullable: false)]
    private ?HabitatEntity $habitatDeLAnimal = null;

    // GETTERs & SETTERS

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

    public function getHabitatDeLAnimal(): ?HabitatEntity
    {
        return $this->habitatDeLAnimal;
    }

    public function setName(string $name): void
    {

        $this->name = $name;
    }

    public function setRace(string $race): void
    {
        $this->race = $race;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function setEtatAnimal(?string $etatAnimal): void
    {
        $this->etatAnimal = $etatAnimal;
    }

    public function setNourritureType(?string $nourritureType): void
    {
        $this->nourritureType = $nourritureType;
    }

    public function setNourritureQuantite(?int $nourritureQuantite): void
    {
        $this->nourritureQuantite = $nourritureQuantite;
    }

    public function setDatePassage(?\DateTimeInterface $datePassage): void
    {
        $this->datePassage = $datePassage;
    }

    public function setDetailsCommentaire(?string $detailsCommentaire): void
    {
        $this->detailsCommentaire = $detailsCommentaire;
    }

    public function setHabitatDeLAnimal(?HabitatEntity $habitatDeLAnimal): void
    {
        $this->habitatDeLAnimal = $habitatDeLAnimal;
    }

    public function __toString(): string
    {
        return $this->name ?? 'Animal';
    }
}