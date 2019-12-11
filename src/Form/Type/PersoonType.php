<?php


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class PersoonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('username', TextType::class, [
                'attr' => ['class' => 'f_reg'],
                'label' => 'Gebruikersnaam'
            ])
            ->add('password', TextType::class, [
                'attr' => ['class' => 'f_reg'],
                'label' => 'Wachtwoord',
                'data' => 'Wachtwoord'
            ])
            ->add('voorvoegsel', ChoiceType::class, [
                'choices'  => [
                    'Dhr.' => "Dhr.",
                    'Mvr.' => "Mvr.",
                ], 'attr' => ['class' => 'f_reg'],
                'label' => 'Voorvoegsel'
            ])
            ->add('voornaam', TextType::class, [
                'attr' => ['class' => 'f_reg'],
                'label' => 'Voornaam'
            ])
            ->add('achternaam', TextType::class, [
                'label' => 'Achternaam'
            ])
            ->add('geboortedatum',  BirthdayType::class, [
                'label' => 'Geboortedatum'
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'man' => "man",
                    'vrouw' => "vrouw"
                    ], 'attr' => ['class' => 'f_reg'],
                'label' => 'Gender'
                ])
            ->add('email', EmailType::class, [
                'label' => 'Emailaddres'
            ])
            ->add('straat', TextType::class, [
                'attr' => ['class' => 'f_reg'],
                'label' => 'Straat'
            ])
            ->add('postcode', TextType::class, [
                'attr' => ['class' => 'f_reg'],
                'label' => 'Postcode'
            ])
            ->add('plaats', TextType::class, [
                'attr' => ['class' => 'f_reg'],
                'label' => 'Plaats'
            ])
            ->add('Gaan', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ])
        ;
    }
}