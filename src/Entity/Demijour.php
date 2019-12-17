<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemijourRepository")
 */
class Demijour
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
    private $idDemijour;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datedemijour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDemijour(): ?int
    {
        return $this->idDemijour;
    }

    public function setIdDemijour(int $idDemijour): self
    {
        $this->idDemijour = $idDemijour;

        return $this;
    }

    public function getDatedemijour(): ?\DateTimeInterface
    {
        return $this->datedemijour;
    }

    public function setDatedemijour(?\DateTimeInterface $datedemijour): self
    {
        $this->datedemijour = $datedemijour;

        return $this;
    }
}
