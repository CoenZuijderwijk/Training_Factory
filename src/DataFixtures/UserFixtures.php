<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Persoon;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
         $user = new Persoon();
         $user
             ->setUsername('dylan')
             ->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'abc'
             ))
             ->setEmail('dylan@mail.com')
             ->setVoorvoegsel('Dhr.')
             ->setVoornaam('Dylan')
             ->setAchternaam('van der Hout')
             ->setGender('man')
             ->setGeboortedatum(new \DateTime('2000-01-01'))
             ->setPostcode('1234AB')
             ->setPlaats('Den Haag')
             ->setStraat('Molenstraat')
             ->setSalary(2000)
             ->setHiringDate(new \DateTime('2015-01-01'));

        $manager->persist($user);
        $manager->flush();
    }
}
