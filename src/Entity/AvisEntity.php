<?php

namespace App\Entity;

use App\Repository\AvisEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: AvisEntityRepository::class)]
#[ORM\Table(name: "avis")]

class AvisEntity 
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "integer", length: 1)]
    #[Assert\Range(min: 1, max: 5)]
    private $nombreEtoileAvis;

    #[ORM\Column(type: "string", length: 255)]
    private $pseudoAvis;

    #[ORM\Column(type: "string", length: 255)]
    private $descriptionAvis;

    #[ORM\Column(nullable: true)]
    private ?bool $validationAvis = null;



    /* GET FUNCTION */
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNombreEtoileAvis(): int
    {
        return $this->nombreEtoileAvis;
    }
    public function getPseudoAvis(): String
    {
        return $this->pseudoAvis;
    }
    public function getDescriptionAvis(): String
    {
        return $this->descriptionAvis;
    }

    // SET FUNCTION
    public function setNombreEtoileAvis(int $nombreEtoileAvis): void
    {
        $this->nombreEtoileAvis = $nombreEtoileAvis;
    }
    public function setPseudoAvis(string $pseudoAvis): void
    {
        $this->pseudoAvis = $pseudoAvis;
    }
    public function setDescriptionAvis(string $descriptionAvis): void
    {
        $this->descriptionAvis = $descriptionAvis;
    }

    public function isValidationAvis(): ?bool
    {
        return $this->validationAvis;
    }

    public function setValidationAvis(?bool $validationAvis): static
    {
        $this->validationAvis = $validationAvis;

        return $this;
    }
}
