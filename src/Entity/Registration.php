<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistrationRepository")
 */
class Registration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payment;




    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lesson", inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $les;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Persoon", inversedBy="registrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $persoon;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }





    public function getLes(): ?Lesson
    {
        return $this->les;
    }

    public function setLes(?Lesson $les): self
    {
        $this->les = $les;

        return $this;
    }

    public function getPersoon(): ?Persoon
    {
        return $this->persoon;
    }

    public function setPersoon(?Persoon $persoon): self
    {
        $this->persoon = $persoon;

        return $this;
    }


    public function getDeelnemers($id)
    {
        $dql = 'SELECT persoon_id FROM AppBundle\Entity\Registration WHERE les_id = $id';
    }

}
