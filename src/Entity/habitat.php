<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatRepository::class)]
#[ORM\Entity]
#[ORM\Table(name: "habitat")]
class Habitat extends Crud_propriete{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $idHabitat;
    
    #[ORM\Column(type:"string")]
    private $habitatType;

    #[ORM\Column(type:"string")]
    private $habitatNom;

    #[ORM\Column(type:"string")]
    private $habitatDescription;

    #[ORM\Column(type:"text")]
    private ?string $habitatImage = null;

    #[ORM\Column(type:"json")]
    private array $listAnimaux;
}
