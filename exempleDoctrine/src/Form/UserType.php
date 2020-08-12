<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('UserEmail')
            ->add('UserPassword', TextType::class, [
                'label' => 'Mot de passe',
                'help' => 'Doit contenir au minimum 8 caractères, donc une majuscule, une minuscule, un chiffre et un caractère spécial'
            ])
            ->add('UserRole', HiddenType::class, [
                'data' => 'client'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
