<?php

namespace App\Entity;

use App\Repository\FormulaireEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaireEntityRepository::class)]
class FormulaireEntity {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(type:"string")]
    private $nomFormulaire;

    #[ORM\Column(type:"string")]
    private $prenomFormulaire;

    #[ORM\Column(type:"string")]
    private $adresseMailFormulaire;

    #[ORM\Column(type:"string")]
    private $sujetFormulaire;

    #[ORM\Column(type:"string")]
    private $descriptionFormulaire;

    public function getId(): ?int
    {
        return $this->id;
    }
}
