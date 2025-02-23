<?php

namespace App\Entity;

use App\Repository\AffichageGeneralRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffichageGeneralRepository::class)]
class AffichageGeneral
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Profil>
     */
    #[ORM\ManyToMany(targetEntity: Profil::class, inversedBy: 'affichageGenerals')]
    private Collection $artistesEnVitrine;

    #[ORM\ManyToOne]
    private ?Actualite $actualiteDialogBox = null;

    public function __construct()
    {
        $this->artistesEnVitrine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Profil>
     */
    public function getArtistesEnVitrine(): Collection
    {
        return $this->artistesEnVitrine;
    }

    public function addArtistesEnVitrine(Profil $artistesEnVitrine): static
    {
        if (!$this->artistesEnVitrine->contains($artistesEnVitrine)) {
            $this->artistesEnVitrine->add($artistesEnVitrine);
        }

        return $this;
    }

    public function removeArtistesEnVitrine(Profil $artistesEnVitrine): static
    {
        $this->artistesEnVitrine->removeElement($artistesEnVitrine);

        return $this;
    }

    public function getActualiteDialogBox(): ?Actualite
    {
        return $this->actualiteDialogBox;
    }

    public function setActualiteDialogBox(?Actualite $actualiteDialogBox): static
    {
        $this->actualiteDialogBox = $actualiteDialogBox;

        return $this;
    }
}
