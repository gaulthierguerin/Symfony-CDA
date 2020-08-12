<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Suppliers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Image;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ProductName', TextType::class, [
                'label' => 'Nom du produit',
                'attr' => [
                    'placeholder' => 'Produit'
                ]
            ])

            ->add('SupplierID', EntityType::class, [
                'class' => Suppliers::class,
                'label' => "Nom du fournisseur"
            ])

            ->add('CategoryID', TextType::class, [
                'label' => 'ID de la Catégorie'
            ])

            ->add('QuantityPerUnit', TextType::class, [
                'label' => 'Quantité par unité',
                'attr' => [
                    'placeholder' => 'Quantité par unité'
                ]
            ])

            ->add('UnitPrice', TextType::class, [
                'label' => 'Prix unitaire',
                'attr' => [
                    'placeholder' => 'Prix unitaire'
                ]
            ])

            ->add('UnitsInStock', TextType::class, [
                'label' => 'Quantité en stock',
                'attr' => [
                    'placeholder' => 'Quantité en stock'
                ]
            ])

            ->add('UnitsOnOrder', TextType::class, [
                'label' => 'Quantité en commande',
                'attr' => [
                    'placeholder' => 'Quantité en commande'
                ]
            ])

            ->add('ReorderLevel', TextType::class, [
                'label' => 'Niveau d\'alerte',
                'attr' => [
                    'placeholder' => 'Niveau d\'alerte'
                ]
            ])

            ->add('Discontinue', CheckboxType::class, [
                'label' => 'Vente suspendue',
                'required' => false,
            ])

            ->add('picture2', FileType::class, [
                'label' => 'Photo du produit',
                //unmapped => fichier non associé à aucune propriété d'entité, validation impossible avec les annotations
                'mapped' => false,
                //pour éviter de recharger la photo lors de l'édition du profil
                'required' => false,
                'constraints' => [
                    new Image([
                        'maxSize' => '2000k',

                        'mimeTypesMessage' => 'Veuillez insérer une photo au format jpg, jpeg, ou png'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
