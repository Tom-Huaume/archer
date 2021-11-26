<?php

namespace App\Entity;

use App\Repository\InscriptionEvenementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionEvenementRepository::class)
 */
class InscriptionEvenement
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
    private $dateHeureInscription;

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

    public function getDateHeureInscription(): ?\DateTimeInterface
    {
        return $this->dateHeureInscription;
    }

    public function setDateHeureInscription(\DateTimeInterface $dateHeureInscription): self
    {
        $this->dateHeureInscription = $dateHeureInscription;

        return $this;
    }
}
