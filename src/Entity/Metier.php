<?php

namespace App\Entity;

use App\Repository\MetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetierRepository::class)]
class Metier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Profil::class, mappedBy: 'metier')]
    private Collection $profils;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;


    public function __construct()
    {
        $this->profils = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Profil>
     */
    public function getProfils(): Collection
    {
        return $this->profils;
    }

    public function addProfil(Profil $profil): static
    {
        if (!$this->profils->contains($profil)) {
            $this->profils->add($profil);
            $profil->addMetier($this);
        }

        return $this;
    }

    public function removeProfil(Profil $profil): static
    {
        if ($this->profils->removeElement($profil)) {
            $profil->removeMetier($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this.$this->getNom();
    }

    /**
     * @return Collection<int, ProfilAdherent>
     */
    public function getProfilAdherrents(): Collection
    {
        return $this->profilAdherrents;
    }

    public function addProfilAdherrent(ProfilAdherent $profilAdherrent): static
    {
        if (!$this->profilAdherrents->contains($profilAdherrent)) {
            $this->profilAdherrents->add($profilAdherrent);
            $profilAdherrent->addMetier($this);
        }

        return $this;
    }

    public function removeProfilAdherrent(ProfilAdherent $profilAdherrent): static
    {
        if ($this->profilAdherrents->removeElement($profilAdherrent)) {
            $profilAdherrent->removeMetier($this);
        }

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }


}
