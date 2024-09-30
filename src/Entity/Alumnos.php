<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Alumnos
 *
 * @ORM\Table(name="alumnos")
 * @ORM\Entity
 */
class Alumnos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=60, nullable=false)
     */
    private $apellido;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer", nullable=false)
     */
    private $edad;

    /**
     * @ORM\ManyToMany(targetEntity=Materias::class, inversedBy="alumno")
     */
    private $materia;


    public function __construct()
    {
        $this->materia = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * @return Collection<int, Materias>
     */
    public function getMateria(): Collection
    {
        return $this->materia;
    }

    public function addMaterium(Materias $materium): self
    {
        if (!$this->materia->contains($materium)) {
            $this->materia[] = $materium;
        }

        return $this;
    }

    public function removeMaterium(Materias $materium): self
    {
        $this->materia->removeElement($materium);

        return $this;
    }

}
