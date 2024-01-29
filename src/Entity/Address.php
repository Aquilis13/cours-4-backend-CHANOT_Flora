<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[Broadcast]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $rue = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_rue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complement = null;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: Personne::class, orphanRemoval: true)]
    private Collection $id_address;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: Batiment::class, orphanRemoval: true)]
    private Collection $address;

    public function __construct()
    {
        $this->id_address = new ArrayCollection();
        $this->address = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getNumeroRue(): ?string
    {
        return $this->numero_rue;
    }

    public function setNumeroRue(string $numero_rue): static
    {
        $this->numero_rue = $numero_rue;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): static
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * @return Collection<int, Personne>
     */
    public function getIdAddress(): Collection
    {
        return $this->id_address;
    }

    public function addIdAddress(Personne $idAddress): static
    {
        if (!$this->id_address->contains($idAddress)) {
            $this->id_address->add($idAddress);
            $idAddress->setAddress($this);
        }

        return $this;
    }

    public function removeIdAddress(Personne $idAddress): static
    {
        if ($this->id_address->removeElement($idAddress)) {
            // set the owning side to null (unless already changed)
            if ($idAddress->getAddress() === $this) {
                $idAddress->setAddress(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Batiment>
     */
    public function getAddress(): Collection
    {
        return $this->address;
    }

    public function addAddress(Batiment $address): static
    {
        if (!$this->address->contains($address)) {
            $this->address->add($address);
            $address->setAddress($this);
        }

        return $this;
    }

    public function removeAddress(Batiment $address): static
    {
        if ($this->address->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getAddress() === $this) {
                $address->setAddress(null);
            }
        }

        return $this;
    }
}
