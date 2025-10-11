<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserFormType extends AbstractType
{
    /**
     * Construction du formulaire utilisateur.
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Nom
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'required' => true,
            ])
            // Prénom
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
            ])
            // Pseudo
            ->add('nickname', TextType::class, [
                'label' => 'Pseudo',
                'required' => true,
            ])
            // Email
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
            ])
            // Mot de passe
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'required' => false,
                'mapped' => true,
                'empty_data' => '',
                'constraints' => [
                    // ✅ Utilisation des arguments nommés pour éviter la dépréciation
                    new NotBlank(
                        message: 'Le mot de passe ne peut pas être vide',
                        groups: ['registration']
                    ),
                ],
            ])
            // Rôles de l'utilisateur
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles',
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Utilisateur' => 'ROLE_USER',
                    'Sales manager' => 'ROLE_SALES_MANAGER',
                ],
                'expanded' => true,   // boutons radio ou checkbox
                'multiple' => true,   // plusieurs rôles possibles
            ])
            // Adresse (facultative)
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'required' => false,
            ])
            // Code postal
            ->add('zipcode', TextType::class, [
                'label' => 'Code postal',
                'required' => false,
            ])
            // Ville
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'required' => false,
            ])
            // Pays
            ->add('country', TextType::class, [
                'label' => 'Pays',
                'required' => false,
            ]);
    }

    /**
     * Configuration des options du formulaire.
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
