<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
#[ORM\Table(name: "horaires")]

class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $lundiStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $lundiClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $mardiStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $mardiClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $mercrediStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $mercrediClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $jeudiStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $jeudiClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $vendrediStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $vendrediClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $samediStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $samediClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $dimancheStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $dimancheClose = null;

    // GETTERs & SETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLundiStart(): ?\DateTimeInterface
    {
        return $this->lundiStart;
    }

    public function setLundiStart(\DateTimeInterface $lundiStart): static
    {
        $this->lundiStart = $lundiStart;

        return $this;
    }

    public function getLundiClose(): ?\DateTimeInterface
    {
        return $this->lundiClose;
    }

    public function setLundiClose(\DateTimeInterface $lundiClose): static
    {
        $this->lundiClose = $lundiClose;

        return $this;
    }

    public function getMardiStart(): ?\DateTimeInterface
    {
        return $this->mardiStart;
    }

    public function setMardiStart(\DateTimeInterface $mardiStart): static
    {
        $this->mardiStart = $mardiStart;

        return $this;
    }

    public function getMardiClose(): ?\DateTimeInterface
    {
        return $this->mardiClose;
    }

    public function setMardiClose(\DateTimeInterface $mardiClose): static
    {
        $this->mardiClose = $mardiClose;

        return $this;
    }

    public function getMercrediStart(): ?\DateTimeInterface
    {
        return $this->mercrediStart;
    }

    public function setMercrediStart(\DateTimeInterface $mercrediStart): static
    {
        $this->mercrediStart = $mercrediStart;

        return $this;
    }

    public function getMercrediClose(): ?\DateTimeInterface
    {
        return $this->mercrediClose;
    }

    public function setMercrediClose(\DateTimeInterface $mercrediClose): static
    {
        $this->mercrediClose = $mercrediClose;

        return $this;
    }

    public function getJeudiStart(): ?\DateTimeInterface
    {
        return $this->jeudiStart;
    }

    public function setJeudiStart(\DateTimeInterface $jeudiStart): static
    {
        $this->jeudiStart = $jeudiStart;

        return $this;
    }

    public function getJeudiClose(): ?\DateTimeInterface
    {
        return $this->jeudiClose;
    }

    public function setJeudiClose(\DateTimeInterface $jeudiClose): static
    {
        $this->jeudiClose = $jeudiClose;

        return $this;
    }

    public function getVendrediStart(): ?\DateTimeInterface
    {
        return $this->vendrediStart;
    }

    public function setVendrediStart(\DateTimeInterface $vendrediStart): static
    {
        $this->vendrediStart = $vendrediStart;

        return $this;
    }

    public function getVendrediClose(): ?\DateTimeInterface
    {
        return $this->vendrediClose;
    }

    public function setVendrediClose(\DateTimeInterface $vendrediClose): static
    {
        $this->vendrediClose = $vendrediClose;

        return $this;
    }

    public function getSamediStart(): ?\DateTimeInterface
    {
        return $this->samediStart;
    }

    public function setSamediStart(\DateTimeInterface $samediStart): static
    {
        $this->samediStart = $samediStart;

        return $this;
    }

    public function getSamediClose(): ?\DateTimeInterface
    {
        return $this->samediClose;
    }

    public function setSamediClose(\DateTimeInterface $samediClose): static
    {
        $this->samediClose = $samediClose;

        return $this;
    }

    public function getDimancheStart(): ?\DateTimeInterface
    {
        return $this->dimancheStart;
    }

    public function setDimancheStart(\DateTimeInterface $dimancheStart): static
    {
        $this->dimancheStart = $dimancheStart;

        return $this;
    }

    public function getDimancheClose(): ?\DateTimeInterface
    {
        return $this->dimancheClose;
    }

    public function setDimancheClose(\DateTimeInterface $dimancheClose): static
    {
        $this->dimancheClose = $dimancheClose;

        return $this;
    }
}
