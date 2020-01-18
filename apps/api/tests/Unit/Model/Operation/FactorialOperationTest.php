<?php

namespace App\Tests\Unit\Model\Operation;

use App\Model\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class FactorialOperationTest
 * @package App\Tests\Unit\Model
 */
class FactorialOperationTest extends TestCase
{

    private $operation = 'factorial';

    public function test_calculate()
    {
        $operation = new Operation();

        $result = $operation->calculate([3], $this->operation);
        $this->assertEquals(6, $result);

        $result = $operation->calculate([2,1,2], $this->operation);
        $this->assertEquals(0, $result);

        $result = $operation->calculate([4,10], $this->operation);
        $this->assertEquals(0, $result);

        $result = $operation->calculate([], $this->operation);
        $this->assertEquals(0, $result);
    }

    public function test_validate()
    {
        $operation = new Operation();

        $result = $operation->validate([], $this->operation);
        $this->assertEquals(false, $result);

        $result = $operation->validate([1], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([123,10], $this->operation);
        $this->assertEquals(false, $result);

        $result = $operation->validate([1,2,3], $this->operation);
        $this->assertEquals(false, $result);
    }

}
