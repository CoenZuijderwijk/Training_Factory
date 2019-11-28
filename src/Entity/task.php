<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class task
{
    /**
     * @Assert\NotBlank
     */
    public $task;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\TextType")
     */
    protected $LoginName;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\TextType")
     */
    protected $FirstName;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\ChoiceType")
     */
    protected $PreProvision;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\TextType")
     */
    protected $LastName;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\DateType")
     */
    protected $Dateofbirth;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\ChoiceType")
     */
    protected $Gender;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\TextType")
     */
    public $Emailadress;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\ChoiceType")
     */
    protected $Persontype;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\TextType")
     */
    protected $Straat;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\TextType")
     */
    protected $Postcode;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\TextType")
     */
    protected $Plaats;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return mixed
     */
    public function getLoginName()
    {
        return $this->LoginName;
    }

    /**
     * @param mixed $Loginname
     */
    public function setLoginName($LoginName): void
    {
        $this->LoginName = $LoginName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param mixed $FirstName
     */
    public function setFirstName($FirstName): void
    {
        $this->FirstName = $FirstName;
    }

    /**
     * @return mixed
     */
    public function getPreProvision()
    {
        return $this->PreProvision;
    }

    /**
     * @param mixed $PreProvision
     */
    public function setPreProvision($PreProvision): void
    {
        $this->PreProvision = $PreProvision;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param mixed $LastName
     */
    public function setLastName($LastName): void
    {
        $this->LastName = $LastName;
    }

    /**
     * @return mixed
     */
    public function getDateofbirth()
    {
        return $this->Dateofbirth;
    }

    /**
     * @param mixed $Dateofbirth
     */
    public function setDateofbirth($Dateofbirth): void
    {
        $this->Dateofbirth = $Dateofbirth;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * @param mixed $Gender
     */
    public function setGender($Gender): void
    {
        $this->Gender = $Gender;
    }

    /**
     * @return mixed
     */
    public function getEmailadress()
    {
        return $this->Emailadress;
    }

    /**
     * @param mixed $Emailadress
     */
    public function setEmailadress($Emailadress): void
    {
        $this->Emailadress = $Emailadress;
    }

    /**
     * @return mixed
     */
    public function getPersontype()
    {
        return $this->Persontype;
    }

    /**
     * @param mixed $Persontype
     */
    public function setPersontype($Persontype): void
    {
        $this->Persontype = $Persontype;
    }

    /**
     * @return mixed
     */
    public function getStraat()
    {
        return $this->Straat;
    }

    /**
     * @param mixed $Straat
     */
    public function setStraat($Straat): void
    {
        $this->Straat = $Straat;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->Postcode;
    }

    /**
     * @param mixed $Postcode
     */
    public function setPostcode($Postcode): void
    {
        $this->Postcode = $Postcode;
    }

    /**
     * @return mixed
     */
    public function getPlaats()
    {
        return $this->Plaats;
    }

    /**
     * @param mixed $Plaats
     */
    public function setPlaats($Plaats): void
    {
        $this->Plaats = $Plaats;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => task::class,
        ]);
    }

}