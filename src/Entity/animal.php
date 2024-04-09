<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "animal")]
class Animal extends Crud_propriete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $idAnimal;

    #[ORM\Column(type: "string", length: 255)]
    private $name;

    #[ORM\Column(type: "string", length: 255)]
    private $race;

    #[ORM\Column(type: "text")]
    private ?string $image = null;

    #[ORM\ManyToOne(targetEntity: "App\Entity\Habitat")]
    private $habitat;

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
}
