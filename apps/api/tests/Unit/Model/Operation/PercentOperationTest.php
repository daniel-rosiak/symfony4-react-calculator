<?php

namespace App\Tests\Unit\Model\Operation;

use App\Model\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class PercentOperationTest
 * @package App\Tests\Unit\Model
 */
class PercentOperationTest extends TestCase
{
    private $operation = 'percent';

    public function test_calculate()
    {
        $operation = new Operation();
        $result = $operation->calculate([10,50], $this->operation);
        $this->assertEquals(5, $result);

        $result = $operation->calculate([10,20,3], $this->operation);
        $this->assertEquals(0, $result);

        $result = $operation->calculate([123], $this->operation);
        $this->assertEquals(0, $result);

        $result = $operation->calculate([], $this->operation);
        $this->assertEquals(0, $result);
    }

    public function test_validate()
    {
        $operation = new Operation();

        $result = $operation->validate([1,2], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([1,2,3], $this->operation);
        $this->assertEquals(false, $result);

        $result = $operation->validate([123], $this->operation);
        $this->assertEquals(false, $result);

        $result = $operation->validate([], $this->operation);
        $this->assertEquals(false, $result);
    }

}
