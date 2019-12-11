<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 */
class Lesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxPersons;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lesNaam;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Training", inversedBy="lessons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;



    public function __construct()
    {
        $this->registrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getMaxPersons(): ?int
    {
        return $this->maxPersons;
    }

    public function setMaxPersons(int $maxPersons): self
    {
        $this->maxPersons = $maxPersons;

        return $this;
    }

    public function getlesNaam(): ?string
    {
        return $this->lesNaam;
    }

    public function setlesNaam(string $lesNaam): self
    {
        $this->lesNaam = $lesNaam;

        return $this;
    }

    public function __toString()
    {
        $serializer = new Serializer(array(new DateTimeNormalizer('d-m-Y')));
        $dateAsString = $serializer->normalize($this->getDate());
        return (string) $dateAsString;
    }

    public function __toString2()
    {
        $serializer = new Serializer(array(new DateTimeNormalizer('H:i')));
        $dateAsString = $serializer->normalize($this->getTime());
        return (String) $dateAsString;
    }


    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(?Training $training): self
    {
        $this->training = $training;

        return $this;
    }
}
