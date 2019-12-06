<?php


namespace App\Form\Type;

use Doctrine\DBAL\Types\JsonType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            ->add('username', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('password', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('voornaam', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('voorvoegsel', ChoiceType::class, [
                'choices'  => [
                    'Dhr.' => "Dhr.",
                    'Mvr.' => "Mvr.",
                ], 'attr' => ['class' => 'f_reg']
            ])
            ->add('achternaam', TextType::class)
            ->add('geboortedatum',  BirthdayType::class)
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'man' => "man",
                    'vrouw' => "vrouw"
                    ], 'attr' => ['class' => 'f_reg']
                ])
            ->add('email', EmailType::class)
            ->add('straat', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('postcode', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('plaats', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ])
        ;
    }
}