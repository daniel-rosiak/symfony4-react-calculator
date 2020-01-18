<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Operation extends Constraint
{
    public $message = 'That type of operation require specific numbers of arguments: "{{ string }}"';

    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}