<?php

namespace App\Tests\Unit\Model\Operation;

use App\Model\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class MultiplyOperationTest
 * @package App\Tests\Unit\Model
 */
class MultiplyOperationTest extends TestCase
{

    private $operation = 'multiply';

    public function test_calculate()
    {
        $operation = new Operation();
        $result = $operation->calculate([1,2], $this->operation);
        $this->assertEquals(2, $result);

        $result = $operation->calculate([1,2,3], $this->operation);
        $this->assertEquals(6, $result);

        $result = $operation->calculate([123,10], $this->operation);
        $this->assertEquals(1230, $result);

        $result = $operation->calculate([8], $this->operation);
        $this->assertEquals(8, $result);

        $result = $operation->calculate([], $this->operation);
        $this->assertEquals(0, $result);
    }

    public function test_validate()
    {
        $operation = new Operation();

        $result = $operation->validate([1,2], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([1,2,3], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([123,10], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([], $this->operation);
        $this->assertEquals(false, $result);
    }

}
