<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beschrijving;

    /**
     * @ORM\Column(type="time")
     */
    private $duur;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $kosten;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    public function getDuur(): ?\DateTimeInterface
    {
        return $this->duur;
    }

    public function setDuur(\DateTimeInterface $duur): self
    {
        $this->duur = $duur;

        return $this;
    }

    public function getKosten(): ?string
    {
        return $this->kosten;
    }

    public function setKosten(?string $kosten): self
    {
        $this->kosten = $kosten;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getNaam();
    }
}
