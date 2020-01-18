<?php

namespace App\Model\Operation;

use App\Model\OperationBase;

class AddOperation extends OperationBase
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
        
        return array_sum($arguments);
    }


}