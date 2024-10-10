<?php

namespace App\Entity;

use App\Repository\FormulaireEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaireEntityRepository::class)]
class FormulaireEntity
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    private $nomFormulaire;

    #[ORM\Column(type: "string")]
    private $prenomFormulaire;

    #[ORM\Column(type: "string")]
    private $adresseMailFormulaire;

    #[ORM\Column(type: "string")]
    private $sujetFormulaire;

    #[ORM\Column(type: "string")]
    private $descriptionFormulaire;

    // GETTERs & SETTERS
    public function getId(): ?int
    {
        return $this->id;
    }

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
    }
    public function setNomFormulaire(string $nomFormulaire): void
    {
        $this->nomFormulaire = $nomFormulaire;
    }
    public function setPrenomFormulaire(string $prenomFormulaire): void
    {
        $this->prenomFormulaire = $prenomFormulaire;
    }
    public function setAdresseMailFormulaire(string $adresseMailFormulaire): void
    {
        $this->adresseMailFormulaire = $adresseMailFormulaire;
    }
    public function setSujetFormulaire(string $sujetFormulaire): void
    {
        $this->sujetFormulaire = $sujetFormulaire;
    }
    public function setDescriptionFormulaire(string $descriptionFormulaire): void
    {
        $this->descriptionFormulaire = $descriptionFormulaire;
    }
}
