<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "animal")]
class Avis extends Crud_propriete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $idAvis;

    #[ORM\Column(type: "Integer", length: 1)]
    private $nombreEtoileAvis;

    #[ORM\Column(type: "string", length: 255)]
    private $pseudoAvis;

    #[ORM\Column(type: "string", length: 255)]
    private $descriptionAvis;
}