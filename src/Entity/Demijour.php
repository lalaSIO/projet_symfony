<?php

namespace App\Entity;

use DateTimeInterface;
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $matiere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moment;

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

    public function getDatedemijour(): DateTimeInterface
    {
        return $this->datedemijour;
    }

    public function setDatedemijour(DateTimeInterface $datedemijour): self
    {
        $this->datedemijour = $datedemijour;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(?string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getMoment(): ?string
    {
        return $this->moment;
    }

    public function setMoment(?string $moment): self
    {
        $this->moment = $moment;

        return $this;
    }
}
