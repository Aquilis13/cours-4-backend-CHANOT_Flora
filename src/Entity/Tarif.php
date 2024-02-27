<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifRepository::class)]
class Tarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $produit_id = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    private ?Taille $taille_id = null;

    #[ORM\Column]
    private ?float $tarif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduitId(): ?Produit
    {
        return $this->produit_id;
    }

    public function setProduitId(?Produit $produit_id): static
    {
        $this->produit_id = $produit_id;

        return $this;
    }

    public function getTailleId(): ?Taille
    {
        return $this->taille_id;
    }

    public function setTailleId(?Taille $taille_id): static
    {
        $this->taille_id = $taille_id;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): static
    {
        $this->tarif = $tarif;

        return $this;
    }
}
