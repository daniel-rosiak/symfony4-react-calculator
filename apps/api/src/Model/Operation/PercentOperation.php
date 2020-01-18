<?php

namespace App\Model\Operation;

use App\Model\OperationBase;

class PercentOperation extends OperationBase
{
    /**
     * @param array $arguments
     * @return mixed
     */
    public function execute(array $arguments)
    {
        if(!$this->validate($arguments)) {
            return 0;
        }

        return ($arguments[1] / 100) * $arguments[0];
    }

    /**
     * @param array $arguments
     * @return bool
     */
    public function validate(array $arguments)
    {
        if(count($arguments) !== 2 || !isset($arguments[0], $arguments[1])) {
            return false;
        }
        return true;
    }
}