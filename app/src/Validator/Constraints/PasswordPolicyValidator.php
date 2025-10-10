<?php
// src/Validator/Constraints/PasswordPolicyValidator.php
namespace App\Validator\Constraints;

use App\Service\PasswordPolicyService as ServicePasswordPolicyService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PasswordPolicyValidator extends ConstraintValidator
{
    public function __construct(private ServicePasswordPolicyService $service) {}

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof PasswordPolicy) {
            throw new \InvalidArgumentException();
        }
        if (!$value) {
            return;
        }

        if (!$this->service->isValid($value)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
