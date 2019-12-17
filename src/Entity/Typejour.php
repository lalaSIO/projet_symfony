<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypejourRepository")
 */
class Typejour
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
    private $idtypejours;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $typejourlibelle;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdtypejours(): ?int
    {
        return $this->idtypejours;
    }

    public function setIdtypejours(int $idtypejours): self
    {
        $this->idtypejours = $idtypejours;

        return $this;
    }

    public function getTypejourlibelle(): ?string
    {
        return $this->typejourlibelle;
    }

    public function setTypejourlibelle(?string $typejourlibelle): self
    {
        $this->typejourlibelle = $typejourlibelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
