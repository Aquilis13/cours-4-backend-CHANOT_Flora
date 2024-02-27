<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'id_address')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $address = null;

    #[ORM\ManyToMany(targetEntity: Batiment::class, mappedBy: 'Personne')]
    private Collection $batiment;

    public function __construct()
    {
        $this->batiment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, Batiment>
     */
    public function getBatiment(): Collection
    {
        return $this->batiment;
    }

    public function addBatiment(Batiment $batiment): static
    {
        if (!$this->batiment->contains($batiment)) {
            $this->batiment->add($batiment);
            $batiment->addPersonne($this);
        }

        return $this;
    }

    public function removeBatiment(Batiment $batiment): static
    {
        if ($this->batiment->removeElement($batiment)) {
            $batiment->removePersonne($this);
        }

        return $this;
    }
}
