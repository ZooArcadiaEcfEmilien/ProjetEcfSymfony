<?php

namespace App\Entity;

use App\Repository\AvisEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisEntityRepository::class)]
#[ORM\Table(name: "avis")]

class AvisEntity 
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "integer", length: 1)]
    private $nombreEtoileAvis;

    #[ORM\Column(type: "string", length: 255)]
    private $pseudoAvis;

    #[ORM\Column(type: "string", length: 255)]
    private $descriptionAvis;
}
