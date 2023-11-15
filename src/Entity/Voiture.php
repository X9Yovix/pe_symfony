<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $serie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateMiseCirculation = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column]
    private ?float $prixJour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): static
    {
        $this->serie = $serie;

        return $this;
    }

    public function getDateMiseCirculation(): ?\DateTimeInterface
    {
        return $this->dateMiseCirculation;
    }

    public function setDateMiseCirculation(\DateTimeInterface $dateMiseCirculation): static
    {
        $this->dateMiseCirculation = $dateMiseCirculation;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getPrixJour(): ?float
    {
        return $this->prixJour;
    }

    public function setPrixJour(float $prixJour): static
    {
        $this->prixJour = $prixJour;

        return $this;
    }
}
