<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersoonRepository")
 */
class Persoon implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voorvoegsel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="date")
     */
    private $geboortedatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

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
    private $straat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plaats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voornaam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        // TODO cleanup the ?? once issue has been resolved
        // https://github.com/symfony/symfony/issues/34824
        return $this->password ?? '';
    }

    public function setPassword(string $password): self
    {

        $this->password = $password;

        return $this;

    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';


        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getVoorvoegsel()
    {
        return $this->voorvoegsel;
    }

    public function setVoorvoegsel($voorvoegsel): self
    {
        $this->voorvoegsel = $voorvoegsel;

        return $this;
    }

    public function getAchternaam()
    {
        return $this->achternaam;
    }

    public function setAchternaam($achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getGeboortedatum()
    {
        return $this->geboortedatum;
    }

    public function setGeboortedatum($geboortedatum): self
    {
        $this->geboortedatum = $geboortedatum;

        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHiringDate()
    {
        return $this->hiring_date;
    }

    public function setHiringDate($hiring_date): self
    {
        $this->hiring_date = $hiring_date;

        return $this;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getStraat()
    {
        return $this->straat;
    }

    public function setStraat($straat): self
    {
        $this->straat = $straat;

        return $this;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getPlaats()
    {
        return $this->plaats;
    }

    public function setPlaats($plaats): self
    {
        $this->plaats = $plaats;

        return $this;
    }

    public function getVoornaam()
    {
        return $this->voornaam;
    }

    public function setVoornaam($voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }
}
