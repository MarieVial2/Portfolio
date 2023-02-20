<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $emailContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titreContact = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenuContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $telephoneContact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(?string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getTitreContact(): ?string
    {
        return $this->titreContact;
    }

    public function setTitreContact(?string $titreContact): self
    {
        $this->titreContact = $titreContact;

        return $this;
    }

    public function getContenuContact(): ?string
    {
        return $this->contenuContact;
    }

    public function setContenuContact(string $contenuContact): self
    {
        $this->contenuContact = $contenuContact;

        return $this;
    }

    public function getTelephoneContact(): ?string
    {
        return $this->telephoneContact;
    }

    public function setTelephoneContact(?string $telephoneContact): self
    {
        $this->telephoneContact = $telephoneContact;

        return $this;
    }
}
