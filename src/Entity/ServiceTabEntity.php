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

    #[ORM\Column(type:"string")]
    private $serviceDescription;

    #[ORM\Column(type:"text")]
    private ?string $serviceImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    /*public function createProperty($propertyName, $propertyValue){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod($propertyValue);
        }
    }

    public function readProperty($propertyName){
        $getterMethod = 'get' . ucfirst($propertyName);
        if (method_exists($this, $getterMethod)) {
            return $this->$getterMethod();
        }
        return null;
    }

    public function updateProperty($propertyName, $propertyValue){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod($propertyValue);
        }
    }

    public function deleteProperty($propertyName){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod(null);
        }
    }*/
}
