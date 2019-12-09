<?php


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;


class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('naam', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('beschrijving', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('duur', TimeType::class, [
                'placeholder' => 'Select a value',
                'attr' => ['class' => 'f_reg']
            ])
            ->add('kosten', TextType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('kosten', MoneyType::class, [
                'attr' => ['class' => 'f_reg']
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ])
        ;
    }
}