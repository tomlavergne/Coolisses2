<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(targetEntity: Profil::class, mappedBy: 'experience')]
    private Collection $profils;

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
            $profil->setExperience($this);
        }

        return $this;
    }

    public function removeProfil(Profil $profil): static
    {
        if ($this->profils->removeElement($profil)) {
            // set the owning side to null (unless already changed)
            if ($profil->getExperience() === $this) {
                $profil->setExperience(null);
            }
        }

        return $this;
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
            $profilAdherrent->setExperience($this);
        }

        return $this;
    }

    public function removeProfilAdherrent(ProfilAdherent $profilAdherrent): static
    {
        if ($this->profilAdherrents->removeElement($profilAdherrent)) {
            // set the owning side to null (unless already changed)
            if ($profilAdherrent->getExperience() === $this) {
                $profilAdherrent->setExperience(null);
            }
        }

        return $this;
    }
}
