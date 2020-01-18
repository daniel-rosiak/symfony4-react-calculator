<?php

namespace App\Model;


interface OperationInterface
{
    public function execute(array $arguments);
}