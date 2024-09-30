<?php

namespace App\Entity;

use App\Repository\MateriasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MateriasRepository::class)
 */
class Materias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\ManyToMany(targetEntity=Alumnos::class, mappedBy="materia")
     */
    private $alumno;

    public function __construct()
    {
        $this->alumno = new ArrayCollection();
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

    /**
     * @return Collection<int, Alumnos>
     */
    public function getAlumnos(): Collection
    {
        return $this->alumnos;
    }

    public function addAlumno(Alumnos $alumno): self
    {
        if (!$this->alumnos->contains($alumno)) {
            $this->alumnos[] = $alumno;
            $alumno->addMaterium($this);
        }

        return $this;
    }

    public function removeAlumno(Alumnos $alumno): self
    {
        if ($this->alumnos->removeElement($alumno)) {
            $alumno->removeMaterium($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Alumnos>
     */
    public function getAlumno(): Collection
    {
        return $this->alumno;
    } 
    
}
