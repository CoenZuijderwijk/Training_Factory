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
use App\Entity\task;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('LoginName', TextType::class)
            ->add('FirstName', TextType::class)
            ->add('PreProvision', ChoiceType::class, [
                'choices'  => [
                    'Dhr.' => "Dhr.",
                    'Mvr.' => "Mvr.",
                ],
            ])
            ->add('LastName', TextType::class)
            ->add('Dateofbirth',  BirthdayType::class)
            ->add('Gender', ChoiceType::class, [
                'choices' => [
                    'man' => "man",
                    'vrouw' => "vrouw"
                    ],
                ])
            ->add('Emailadress', EmailType::class)
            ->add('Persontype', ChoiceType::class, [
                'choices' => [
                    'lid' => "2",
                ],

            ])
            ->add('Straat', TextType::class)
            ->add('Postcode', TextType::class)
            ->add('Plaats', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}