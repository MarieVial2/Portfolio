<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intituleExperience = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $dateDebut = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $dateFin = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $missionsExperience = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etablissementExperience = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntituleExperience(): ?string
    {
        return $this->intituleExperience;
    }

    public function setIntituleExperience(string $intituleExperience): self
    {
        $this->intituleExperience = $intituleExperience;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?string $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->dateFin;
    }

    public function setDateFin(?string $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getMissionsExperience(): ?string
    {
        return $this->missionsExperience;
    }

    public function setMissionsExperience(?string $missionsExperience): self
    {
        $this->missionsExperience = $missionsExperience;

        return $this;
    }

    public function getEtablissementExperience(): ?string
    {
        return $this->etablissementExperience;
    }

    public function setEtablissementExperience(?string $etablissementExperience): self
    {
        $this->etablissementExperience = $etablissementExperience;

        return $this;
    }
}
