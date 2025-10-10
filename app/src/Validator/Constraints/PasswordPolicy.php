<?php
// src/Validator/Constraints/PasswordPolicy.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PasswordPolicy extends Constraint
{
    public string $message = 'Le mot de passe ne respecte pas la politique de sécurité (longueur ≥10, majuscule, chiffre, caractère spécial).';
}
