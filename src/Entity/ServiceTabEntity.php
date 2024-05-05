<?php

namespace App\Entity;

use App\Repository\ServiceTabEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceTabEntityRepository::class)]
class ServiceTabEntity 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:"string")]
    private $serviceNom;

    #[ORM\Column(type:"string")]
    private $serviceTitre;

    #[ORM\Column(type:"text")]
    private $serviceDescription;

    #[ORM\Column(type:"text")]
    private ?string $serviceImage = null;

    // METHODES
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getServiceNom(): string
    {
        return $this->serviceNom;
    }
    public function getServiceTitre(): string
    { 
        return $this->serviceTitre;
    }
    public function getServiceDescription(): string
    {
        return $this->serviceDescription;
    }
    public function getServiceImage(): string
    {
        return 'uploads/images/Services/' . $this->serviceImage;
    }

    // SET FUNCTION
    public function setServiceNom(string $serviceNom): void
    {   
        $this->serviceNom = $serviceNom;
    }

    public function setServiceTitre(string $serviceTitre): void
    {
        $this->serviceTitre = $serviceTitre;
    }

    public function setServiceDescription(string $serviceDescription): void
    {
        $this->serviceDescription = $serviceDescription;
    }

    public function setServiceImage(?string $serviceImage): void
    {
        $this->serviceImage = $serviceImage;
    }

}