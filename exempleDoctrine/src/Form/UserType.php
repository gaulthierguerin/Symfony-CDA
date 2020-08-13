<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('UserEmail', EmailType::class)
            ->add('plainPassword', RepeatedType::class, array (
                'type' =>PasswordType::class,
                'first_options' => array('label' => 'Mot de Passe', 'help' => 'Doit contenir au minimum 8 caractères, donc une majuscule, une minuscule, un chiffre et un caractère spécial'
                ),
                'second_options' => array('label'=>'Répétez le mot de passe')
                )
            )
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
