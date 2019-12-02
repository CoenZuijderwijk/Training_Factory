<?php


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Persoon;


class PersoonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('Loginnaam', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('Wachtwoord', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('Voornaam', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('Voorvoegsel', ChoiceType::class, [
                'choices'  => [
                    'Dhr.' => "Dhr.",
                    'Mvr.' => "Mvr.",
                ], 'attr' => ['class' => 'f_reg']
            ])
            ->add('Achternaam', TextType::class)
            ->add('Geboortedatum',  BirthdayType::class)
            ->add('Gender', ChoiceType::class, [
                'choices' => [
                    'man' => "man",
                    'vrouw' => "vrouw"
                    ], 'attr' => ['class' => 'f_reg']
                ])
            ->add('Emailadress', EmailType::class)
            ->add('Functie', ChoiceType::class, [
                'choices' => [
                    'Lid' => "2",
                ], 'attr' => ['class' => 'f_reg']

            ])
            ->add('Straat', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('Postcode', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('Plaats', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ])
        ;
    }
}