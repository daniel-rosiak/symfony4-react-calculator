<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use App\Model\Operation as OperationModel;

class OperationValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Operation) {
            throw new UnexpectedTypeException($constraint, Operation::class);
        }

        if (null === $value || '' === $value || !is_array($value)) {
            return;
        }

        if ( ! (new OperationModel())->validate($value, $this->context->getRoot()->get('type')->getData())) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', json_encode($value))
                ->addViolation();
        }

    }
}