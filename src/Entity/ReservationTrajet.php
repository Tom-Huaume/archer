<?php

namespace App\Entity;

use App\Repository\ReservationTrajetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationTrajetRepository::class)
 */
class ReservationTrajet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDemande;

    /**
     * @ORM\ManyToOne(targetEntity=Trajet::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trajet;

    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="reservationTrajets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidation(): ?bool
    {
        return $this->validation;
    }

    public function setValidation(bool $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getDateHeureDemande(): ?\DateTimeInterface
    {
        return $this->dateHeureDemande;
    }

    public function setDateHeureDemande(\DateTimeInterface $dateHeureDemande): self
    {
        $this->dateHeureDemande = $dateHeureDemande;

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?Trajet $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }
}
