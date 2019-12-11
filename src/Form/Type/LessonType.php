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
            ->add('lesNaam', EntityType::class, [
                'class' => Training::class,
                'choice_label' => function(Training $training)  {
                    return sprintf('%s', $training->__toString());
                } , 'label' => 'Les naam'
            ])
            ->add('time', TimeType::class, [
                'placeholder' => 'Select a value',
                'attr' => ['class' => 'l_form'],
                'label' => 'Tijdstip'
            ])
            ->add('date', DateType::class, [
                'attr' => ['class' => 'l_form'],
                'label' => 'Datum'
            ])
            ->add('Location', TextType::class, [
                'attr' => ['class' => 'l_form'],
                'label' => 'Locatie'
            ])
            ->add('maxPersons', NumberType::class, [
                'attr' => ['class' => 'l_form'],
                'label' => 'Max aantal personen'
            ])
            ->add('Toevoegen', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ])
        ;
    }
}