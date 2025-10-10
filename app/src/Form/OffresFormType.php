<?php

namespace App\Form;

use App\Entity\Offres;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class OffresFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label' => 'Image',
                'mapped' => false, // pas lié directement à l'entité
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (jpeg/png/webp)',
                    ]),
                ],
            ])

            ->add('isLocked', CheckboxType::class, ['label' => 'Offre fermée'])
            ->add('isPublished', CheckboxType::class, ['label' => 'Offre visible'])
            ->add('intitule', TextType::class, [
                'label' => 'Intitulé',
                'attr' => ['placeholder' => 'Entrez l\'intitulé de l\'offre'],
            ])
            ->add('prix', NumberType::class, [
                'label' => 'Prix en euros',
                'scale' => 2, // nombre de décimales
                'grouping' => true, // séparateur de milliers             
                'attr' => [
                    'placeholder' => '0,00',
                    'style' => 'text-align: right;',
                ],
            ])

            ->add('date_debut', DateTimeType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                'attr' => ['placeholder' => 'Entrez la date de début'],
            ])
            ->add('date_fin', DateTimeType::class, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
                'attr' => ['placeholder' => 'Entrez la date de fin'],
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Entrez la description de l\'offre'],
            ])
            ->add('code', TextType::class, [
                'label' => 'Code',
                'attr' => ['placeholder' => 'Entrez le code de l\'offre'],
            ])
            ->add('nbr_enfants', NumberType::class, ['html5' => true])
            ->add('nbr_adultes', NumberType::class, ['html5' => true])
            ->add('created_at', DateTimeType::class, [
                'mapped' => false,
                'label' => 'Créé le',
                'widget' => 'single_text',
                'attr' => ['disabled' => true],
            ])
            ->add('updated_at', DateTimeType::class, [
                'mapped' => false,
                'label' => 'Mise à jour le',
                'widget' => 'single_text',
                'attr' => ['disabled' => true],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offres::class,
        ]);
    }
}
