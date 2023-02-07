<?php

namespace App\Entity;

use App\Repository\TechnologieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechnologieRepository::class)]
class Technologie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomTechnologie = null;

    #[ORM\Column(length: 255)]
    private ?string $logoTechnologie = null;

    #[ORM\ManyToMany(targetEntity: Realisation::class, inversedBy: 'technologies')]
    private Collection $realisations;

    public function __construct()
    {
        $this->realisations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTechnologie(): ?string
    {
        return $this->nomTechnologie;
    }

    public function setNomTechnologie(string $nomTechnologie): self
    {
        $this->nomTechnologie = $nomTechnologie;

        return $this;
    }

    public function getLogoTechnologie(): ?string
    {
        return $this->logoTechnologie;
    }

    public function setLogoTechnologie(string $logoTechnologie): self
    {
        $this->logoTechnologie = $logoTechnologie;

        return $this;
    }

    /**
     * @return Collection<int, Realisation>
     */
    public function getRealisations(): Collection
    {
        return $this->realisations;
    }

    public function addRealisation(Realisation $realisation): self
    {
        if (!$this->realisations->contains($realisation)) {
            $this->realisations->add($realisation);
        }

        return $this;
    }

    public function removeRealisation(Realisation $realisation): self
    {
        $this->realisations->removeElement($realisation);

        return $this;
    }
}
