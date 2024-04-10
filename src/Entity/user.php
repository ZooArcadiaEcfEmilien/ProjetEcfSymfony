<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: "user")]
class User{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $idUser;

    #[ORM\Column(type:"string")]
    private $userType;

    #[ORM\Column(type:"string")]
    private $userName;

    #[ORM\Column(type:"string")]
    private $password;

    #[ORM\Column(type:"string")]
    private $mail;

//---------------------------------------------FONCTIONS CRUD---------------------------------------------//
    public function getId(): ?int{
        return $this->id;
    }

    public function createProperty($propertyName, $propertyValue){
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
    }
}
