<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ArrayOfNumbersValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ArrayOfNumbers) {
            throw new UnexpectedTypeException($constraint, ArrayOfNumbers::class);
        }

        if (null === $value || '' === $value || !is_array($value)) {
            return;
        }
        
        if ( count( $value ) !== count( array_filter( $value, 'is_numeric' ) ) ) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', json_encode($value))
                ->addViolation();
        }

    }
}