<?php

namespace App\Entity;

use App\Repository\UserTabEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Void_;

#[ORM\Entity(repositoryClass: UserTabEntityRepository::class)]
#[ORM\Table(name:"user")]

class UserTabEntity 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:"string")]
    private $userType;

    #[ORM\Column(type:"string")]
    private $userName;

    #[ORM\Column(type:"string")]
    private $password;

    #[ORM\Column(type:"string")]
    private $mail;
    
    //  METHODES 

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUserType(): ?string
    {
        return $this->userType;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getMail(): ?string
    {
        return $this->mail;
    }
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserType(string $userType): void 
    {
        $this->userType = $userType;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

}
