<?php

namespace App\Model\Operation;

use App\Model\OperationBase;

class FactorialOperation extends OperationBase
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

        $result = 1;
        for ($i = 1; $i <= $arguments[0]; $i++){
            $result = $result * $i;
        }
        return $result;
    }

    /**
     * @param array $arguments
     * @return bool
     */
    public function validate(array $arguments)
    {
        if(count($arguments) !== 1 || !isset($arguments[0])) {
            return false;
        }
        return true;
    }

}