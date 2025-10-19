<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MockPaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('paymentMethod', ChoiceType::class, [
                'label' => 'Mode de paiement',
                'choices' => [
                    'Carte Bleue' => 'cb',
                    'Mastercard' => 'mastercard',
                    'Visa' => 'visa',
                    'PayPal' => 'paypal',
                ],
                'expanded' => true, // boutons radio
                'multiple' => false,
                'attr' => ['class' => 'payment-methods'],
            ])
            ->add('cardHolder', TextType::class, [
                'label' => 'Titulaire de la carte',
                'required' => false,
                'attr' => ['placeholder' => 'Nom sur la carte'],
            ])
            ->add('cardNumber', TextType::class, [
                'label' => 'Numéro de carte (mock)',
                'required' => false,
                'attr' => ['placeholder' => 'XXXX XXXX XXXX XXXX'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
