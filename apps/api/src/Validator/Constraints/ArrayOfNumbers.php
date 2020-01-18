<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ArrayOfNumbers extends Constraint
{
    public $message = 'The array "{{ string }}" contains an illegal character: it can only contain numbers.';

    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}