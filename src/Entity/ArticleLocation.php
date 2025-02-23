<?php

namespace App\Entity;

use App\Repository\ArticleLocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleLocationRepository::class)]
class ArticleLocation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $tarifJour = null;

    #[ORM\Column(nullable: true)]
    private ?int $tarif25Jours = null;

    #[ORM\Column(nullable: true)]
    private ?int $tarifPlus6Jours = null;

    #[ORM\Column(nullable: true)]
    private ?int $caution = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTarifJour(): ?int
    {
        return $this->tarifJour;
    }

    public function setTarifJour(?int $tarifJour): static
    {
        $this->tarifJour = $tarifJour;

        return $this;
    }

    public function getTarif25Jours(): ?int
    {
        return $this->tarif25Jours;
    }

    public function setTarif25Jours(?int $tarif25Jours): static
    {
        $this->tarif25Jours = $tarif25Jours;

        return $this;
    }

    public function getTarifPlus6Jours(): ?int
    {
        return $this->tarifPlus6Jours;
    }

    public function setTarifPlus6Jours(?int $tarifPlus6Jours): static
    {
        $this->tarifPlus6Jours = $tarifPlus6Jours;

        return $this;
    }

    public function getCaution(): ?int
    {
        return $this->caution;
    }

    public function setCaution(?int $caution): static
    {
        $this->caution = $caution;

        return $this;
    }
}
