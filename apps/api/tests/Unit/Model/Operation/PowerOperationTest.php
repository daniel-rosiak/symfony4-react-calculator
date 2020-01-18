<?php

namespace App\Tests\Unit\Model\Operation;

use App\Model\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class PowerOperationTest
 * @package App\Tests\Unit\Model
 */
class PowerOperationTest extends TestCase
{

    private $operation = 'power';

    public function test_calculate()
    {
        $operation = new Operation();
        $result = $operation->calculate([2,2], $this->operation);
        $this->assertEquals(4, $result);

        $result = $operation->calculate([3,2,3], $this->operation);
        $this->assertEquals(0, $result);

        $result = $operation->calculate([3,3], $this->operation);
        $this->assertEquals(27, $result);

        $result = $operation->calculate([4], $this->operation);
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
