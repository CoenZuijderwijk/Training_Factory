<?php


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class LoginType extends AbstractType
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
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'f_reg']
            ])
        ;
    }
}