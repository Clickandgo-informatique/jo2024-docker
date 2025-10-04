<?php

namespace App\Form;

use App\Entity\Sports;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SportsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('intitule', TextType::class, ['label' => 'Intitulé'])           
            ->add('icone', TextType::class, ['label' => 'Icône', 'required' => false])
            ->add('background_color', TextType::class, ['label' => 'Couleur de fond', 'required' => false])
            ->add('slug', TextType::class, ['label' => 'Slug', 'disabled' => true, 'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sports::class,
        ]);
    }
}
