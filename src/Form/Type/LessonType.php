<?php


namespace App\Form\Type;

use App\Entity\Training;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;


class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('lesNaam', TextType::class, [
                'attr' => ['class' => 'l_form']
            ])
            ->add('lesNaam', EntityType::class, [
                'class' => Training::class,
                'choice_label' => function(Training $training)  {
                    return sprintf('%d %s', $training->getId(), $training->__toString());
                }
            ])
            ->add('time', TimeType::class, [
                'placeholder' => 'Select a value',
                'attr' => ['class' => 'l_form']
            ])
            ->add('date', DateType::class, [
                'attr' => ['class' => 'l_form']
            ])
            ->add('Location', TextType::class, [
                'attr' => ['class' => 'l_form']
            ])
            ->add('maxPersons', NumberType::class, [
                'attr' => ['class' => 'l_form']
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ])
        ;
    }
}