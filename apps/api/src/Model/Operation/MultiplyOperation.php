<?php

namespace App\Model\Operation;

use App\Model\OperationBase;

class MultiplyOperation extends OperationBase
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

        $result = reset($arguments);
        foreach (array_slice($arguments, 1) as $value) {
            $result *= $value;
        }
        return $result;
    }

}