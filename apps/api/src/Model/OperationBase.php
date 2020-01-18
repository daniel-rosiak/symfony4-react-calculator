<?php

namespace App\Model;


abstract class OperationBase implements OperationInterface
{
    public function validate(array $arguments) {

        if(count($arguments) < 1) {
            return false;
        }
        return true;
    }

}