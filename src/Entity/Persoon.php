<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersoonRepository")
 */
class Persoon
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
    private $Loginnaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Wachtwoord;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Voorvoegsel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Achternaam;

    /**
     * @ORM\Column(type="date")
     */
    private $Geboortedatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Emailadress;

    /**
     * @ORM\Column(type="integer")
     */
    private $Functie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $hiring_date;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Straat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Plaats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Voornaam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoginnaam(): ?string
    {
        return $this->Loginnaam;
    }

    public function setLoginnaam(string $Loginnaam): self
    {
        $this->Loginnaam = $Loginnaam;

        return $this;
    }

    public function getWachtwoord(): ?string
    {
        return $this->Wachtwoord;
    }

    public function setWachtwoord(string $Wachtwoord): self
    {
        $this->Wachtwoord = $Wachtwoord;

        return $this;
    }

    public function getVoorvoegsel(): ?string
    {
        return $this->Voorvoegsel;
    }

    public function setVoorvoegsel(string $Voorvoegsel): self
    {
        $this->Voorvoegsel = $Voorvoegsel;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->Achternaam;
    }

    public function setAchternaam(string $Achternaam): self
    {
        $this->Achternaam = $Achternaam;

        return $this;
    }

    public function getGeboortedatum(): ?\DateTimeInterface
    {
        return $this->Geboortedatum;
    }

    public function setGeboortedatum(\DateTimeInterface $Geboortedatum): self
    {
        $this->Geboortedatum = $Geboortedatum;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(string $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getEmailadress(): ?string
    {
        return $this->Emailadress;
    }

    public function setEmailadress(string $Emailadress): self
    {
        $this->Emailadress = $Emailadress;

        return $this;
    }

    public function getFunctie(): ?int
    {
        return $this->Functie;
    }

    public function setFunctie(int $Functie): self
    {
        $this->Functie = $Functie;

        return $this;
    }

    public function getHiringDate(): ?\DateTimeInterface
    {
        return $this->hiring_date;
    }

    public function setHiringDate(?\DateTimeInterface $hiring_date): self
    {
        $this->hiring_date = $hiring_date;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getStraat(): ?string
    {
        return $this->Straat;
    }

    public function setStraat(string $Straat): self
    {
        $this->Straat = $Straat;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->Postcode;
    }

    public function setPostcode(string $Postcode): self
    {
        $this->Postcode = $Postcode;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->Plaats;
    }

    public function setPlaats(string $Plaats): self
    {
        $this->Plaats = $Plaats;

        return $this;
    }

    public function getVoornaam(): ?string
    {
        return $this->Voornaam;
    }

    public function setVoornaam(string $Voornaam): self
    {
        $this->Voornaam = $Voornaam;

        return $this;
    }
}
