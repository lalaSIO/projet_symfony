<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JourRepository")
 */
class Jour
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idJour;

    /**
     * @ORM\Column(type="date")
     */
    private $dateJour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idtypejour;

    /**
     * @ORM\Column(type="integer")
     */
    private $idTypeJour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJour(): ?int
    {
        return $this->idJour;
    }

    public function setIdJour(int $idJour): self
    {
        $this->idJour = $idJour;

        return $this;
    }

    public function getDateJour(): ?\DateTimeInterface
    {
        return $this->dateJour;
    }

    public function setDateJour(\DateTimeInterface $dateJour): self
    {
        $this->dateJour = $dateJour;

        return $this;
    }

    public function getIdtypejour(): ?string
    {
        return $this->idtypejour;
    }

    public function setIdtypejour(string $idtypejour): self
    {
        $this->idtypejour = $idtypejour;

        return $this;
    }
}
