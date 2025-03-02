<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
#[Vich\Uploadable]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;


    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(nullable: true)]
        private ?int $tailleEnCentimetre = null;

    #[ORM\Column()]
    private ?int $localisation = null;

    #[ORM\ManyToMany(targetEntity: Metier::class, inversedBy: 'profils')]
    private Collection $metier;

    #[ORM\ManyToOne(inversedBy: 'profils')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Genre $genre = null;

    #[ORM\ManyToOne(inversedBy: 'profils')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Experience $experience = null;


    #[Vich\UploadableField(mapping: 'profilImage', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $imageName = null;

    #[Vich\UploadableField(mapping: 'cvPDF', fileNameProperty: 'PDFName')]
    private ?File $PDFFile = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $PDFName = null;

    #[Vich\UploadableField(mapping: 'voixMP3', fileNameProperty: 'MP3Name')]
    private ?File $MP3File = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $MP3Name = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Langue::class, inversedBy: 'profils')]
    private Collection $langues;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateInscription = null;

    /**
     * @var Collection<int, AffichageGeneral>
     */
    #[ORM\ManyToMany(targetEntity: AffichageGeneral::class, mappedBy: 'artistesEnVitrine')]
    private Collection $affichageGenerals;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        $this->metier = new ArrayCollection();
        $this->langues = new ArrayCollection();
        $this->affichageGenerals = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTailleEnCentimetre(): ?int
    {
        return $this->tailleEnCentimetre;
    }

    public function setTailleEnCentimetre(?int $tailleEnCentimetre): static
    {
        $this->tailleEnCentimetre = $tailleEnCentimetre;

        return $this;
    }

    public function getLocalisation(): ?int
    {
        return $this->localisation;
    }

    public function setLocalisation(?int $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * @return Collection<int, Metier>
     */
    public function getMetier(): Collection
    {
        return $this->metier;
    }

    public function addMetier(Metier $metier): static
    {
        if (!$this->metier->contains($metier)) {
            $this->metier->add($metier);
        }

        return $this;
    }

    public function removeMetier(Metier $metier): static
    {
        $this->metier->removeElement($metier);

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(?Experience $experience): static
    {
        $this->experience = $experience;

        return $this;
    }


    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }


    public function getPDFFile(): ?File
    {
        return $this->PDFFile;
    }

    public function setPDFFile(?File $PDFFile = null): void
    {
        $this->PDFFile = $PDFFile;

        if (null !== $PDFFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getPDFName(): ?string
    {
        return $this->PDFName;
    }

    public function setPDFName(?string $PDFName): void
    {
        $this->PDFName = $PDFName;
    }

    public function getMP3File(): ?File
    {
        return $this->MP3File;
    }

    public function setMP3File(?File $MP3File = null): void
    {
        $this->MP3File = $MP3File;

        if (null !== $MP3File) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }


    public function getMP3Name(): ?string
    {
        return $this->MP3Name;
    }

    public function setMP3Name(?string $MP3Name): void
    {
        $this->MP3Name = $MP3Name;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Collection<int, Langue>
     */
    public function getLangues(): Collection
    {
        return $this->langues;
    }

    public function addLangue(Langue $langue): static
    {
        if (!$this->langues->contains($langue)) {
            $this->langues->add($langue);
        }

        return $this;
    }

    public function removeLangue(Langue $langue): static
    {
        $this->langues->removeElement($langue);

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): static
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * @return Collection<int, AffichageGeneral>
     */
    public function getAffichageGenerals(): Collection
    {
        return $this->affichageGenerals;
    }

    public function addAffichageGeneral(AffichageGeneral $affichageGeneral): static
    {
        if (!$this->affichageGenerals->contains($affichageGeneral)) {
            $this->affichageGenerals->add($affichageGeneral);
            $affichageGeneral->addArtistesEnVitrine($this);
        }

        return $this;
    }

    public function removeAffichageGeneral(AffichageGeneral $affichageGeneral): static
    {
        if ($this->affichageGenerals->removeElement($affichageGeneral)) {
            $affichageGeneral->removeArtistesEnVitrine($this);
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

}
