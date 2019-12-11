<?php


namespace App\Form\Type;

use App\Entity\Lesson;
use App\Entity\Persoon;
use App\Entity\Training;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('les', EntityType::class, [
                'class' => Lesson::class,
                'choice_label' => function (Lesson $les) {
                    return sprintf('%s %s %s ',  $les->getlesNaam(), $les->__toString(), $les->__toString2());
                },
                'label' => 'Les'
            ])
            ->add('Inschrijven', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ]);
    }
}