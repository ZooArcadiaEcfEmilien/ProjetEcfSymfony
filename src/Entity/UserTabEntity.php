<?php

namespace App\Entity;

use App\Repository\UserTabEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

#[ORM\Entity(repositoryClass: UserTabEntityRepository::class)]
#[ORM\Table(name:"user")]
#[UniqueEntity(fields: ['mail'], message: 'Il y a déjà un compte avec cette adresse email')]
class UserTabEntity implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:"string")]
    private $userName;

    #[ORM\Column(type:"string", length:255)]
    private string $password;

    #[ORM\Column(type:"string", unique: true)]
    private $mail;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    //  METHODES 

    public function getId(): ?int
    {
        return $this->id;
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

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }
    public function setUserName(?string $userName): void
    {
        $this->userName = $userName;
    }
        /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        $roles[] = 'ROLE_ADMIN'; 

        return array_unique($roles);
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    // Implémentation des méthodes de UserInterface
    public function eraseCredentials(): void
    {
        // Cette méthode est inutile dans notre cas, car nous n'avons rien à effacer.
        // Mais elle est requise par l'interface UserInterface.
    }



    public function getUserIdentifier(): string
    {
        // Retourne l'identifiant de l'utilisateur.
        // Dans notre cas, nous utilisons l'identifiant de l'utilisateur comme identifiant unique.
        return $this->mail;
    }
}
