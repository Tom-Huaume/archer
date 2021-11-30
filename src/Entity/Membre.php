<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 */
class Membre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $numLicence;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telMobile;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $lateralite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $civilite;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="organisateur")
     */
    private $trajets;

    /**
     * @ORM\OneToMany(targetEntity=ReservationTrajet::class, mappedBy="membre")
     */
    private $reservationTrajets;

    /**
     * @ORM\OneToMany(targetEntity=InscriptionEvenement::class, mappedBy="membre")
     */
    private $inscriptionEvenements;

    public function __construct()
    {
        $this->trajets = new ArrayCollection();
        $this->reservationTrajets = new ArrayCollection();
        $this->inscriptionEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumLicence(): ?string
    {
        return $this->numLicence;
    }

    public function setNumLicence(string $numLicence): self
    {
        $this->numLicence = $numLicence;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getTelMobile(): ?string
    {
        return $this->telMobile;
    }

    public function setTelMobile(?string $telMobile): self
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLateralite(): ?string
    {
        return $this->lateralite;
    }

    public function setLateralite(?string $lateralite): self
    {
        $this->lateralite = $lateralite;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getTrajets(): Collection
    {
        return $this->trajets;
    }

    public function addTrajet(Trajet $trajet): self
    {
        if (!$this->trajets->contains($trajet)) {
            $this->trajets[] = $trajet;
            $trajet->setOrganisateur($this);
        }

        return $this;
    }

    public function removeTrajet(Trajet $trajet): self
    {
        if ($this->trajets->removeElement($trajet)) {
            // set the owning side to null (unless already changed)
            if ($trajet->getOrganisateur() === $this) {
                $trajet->setOrganisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ReservationTrajet[]
     */
    public function getReservationTrajets(): Collection
    {
        return $this->reservationTrajets;
    }

    public function addReservationTrajet(ReservationTrajet $reservationTrajet): self
    {
        if (!$this->reservationTrajets->contains($reservationTrajet)) {
            $this->reservationTrajets[] = $reservationTrajet;
            $reservationTrajet->setMembre($this);
        }

        return $this;
    }

    public function removeReservationTrajet(ReservationTrajet $reservationTrajet): self
    {
        if ($this->reservationTrajets->removeElement($reservationTrajet)) {
            // set the owning side to null (unless already changed)
            if ($reservationTrajet->getMembre() === $this) {
                $reservationTrajet->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InscriptionEvenement[]
     */
    public function getInscriptionEvenements(): Collection
    {
        return $this->inscriptionEvenements;
    }

    public function addInscriptionEvenement(InscriptionEvenement $inscriptionEvenement): self
    {
        if (!$this->inscriptionEvenements->contains($inscriptionEvenement)) {
            $this->inscriptionEvenements[] = $inscriptionEvenement;
            $inscriptionEvenement->setMembre($this);
        }

        return $this;
    }

    public function removeInscriptionEvenement(InscriptionEvenement $inscriptionEvenement): self
    {
        if ($this->inscriptionEvenements->removeElement($inscriptionEvenement)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionEvenement->getMembre() === $this) {
                $inscriptionEvenement->setMembre(null);
            }
        }

        return $this;
    }
}
