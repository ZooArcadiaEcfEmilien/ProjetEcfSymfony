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

        /* GET FUNCTION */

    public function getId(): ?int
    {
        return $this->id;
    }
    /*
    public function getNomFormulaire(): string
    {
        return $this->nomFormulaire;
    }
    public function getPrenomFormulaire(): string
    {
        return $this->prenomFormulaire;
    }
    public function getDescriptionFormulaire(): string
    {
        return $this->descriptionFormulaire;
    }
    public function getAdresseMailFormulaire(): string
    {
        return $this->adresseMailFormulaire;
    }
    public function getSujetFormulaire(): string
    {
        return $this->sujetFormulaire;
    }*/
    // SET FUNCTION
    public function getNomFormulaire(string $nomFormulaire): void
    {
        $this->nomFormulaire = $nomFormulaire;
    }
}
