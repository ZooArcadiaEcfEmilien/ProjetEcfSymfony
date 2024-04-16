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

    //SET METHODE
    public function getId(): ?int
    {
        return $this->id;
    }
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
    }public function setHabitat(HabitatEntity $habitat): void
    {
        $this->habitat = $habitat;
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

    public function setDetailCommentaire (?string $detailsCommentaire): void
    {
        $this->detailsCommentaire = $detailsCommentaire;
    }
}
