<?php

namespace App\Entity;

use App\Repository\RealisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealisationRepository::class)]
class Realisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $titreRealisation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionRealisation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienRealisation = null;

    #[ORM\ManyToMany(targetEntity: Technologie::class, mappedBy: 'realisations')]
    private Collection $technologies;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageRealisation = null;

    public function __construct()
    {
        $this->technologies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreRealisation(): ?string
    {
        return $this->titreRealisation;
    }

    public function setTitreRealisation(string $titreRealisation): self
    {
        $this->titreRealisation = $titreRealisation;

        return $this;
    }

    public function getDescriptionRealisation(): ?string
    {
        return $this->descriptionRealisation;
    }

    public function setDescriptionRealisation(?string $descriptionRealisation): self
    {
        $this->descriptionRealisation = $descriptionRealisation;

        return $this;
    }

    public function getLienRealisation(): ?string
    {
        return $this->lienRealisation;
    }

    public function setLienRealisation(?string $lienRealisation): self
    {
        $this->lienRealisation = $lienRealisation;

        return $this;
    }

    /**
     * @return Collection<int, Technologie>
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(Technologie $technology): self
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies->add($technology);
            $technology->addRealisation($this);
        }

        return $this;
    }

    public function removeTechnology(Technologie $technology): self
    {
        if ($this->technologies->removeElement($technology)) {
            $technology->removeRealisation($this);
        }

        return $this;
    }

    public function getImageRealisation(): ?string
    {
        return $this->imageRealisation;
    }

    public function setImageRealisation(?string $imageRealisation): self
    {
        $this->imageRealisation = $imageRealisation;

        return $this;
    }
}
