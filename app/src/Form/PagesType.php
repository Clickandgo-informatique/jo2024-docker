<?php

namespace App\Form;

use App\Entity\Pages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ['label' => 'Titre principal de la page'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('slug', TextType::class, [
                'label' => 'Slug',
                'required' => false,
                'disabled' => true,
                'attr' => ['class' => 'text-muted']
            ])
            ->add('position', NumberType::class, [
                'required' => false,
                'html5' => true,
                'label' => 'Position'
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pages::class,
        ]);
    }
}
