<?php

namespace App\Tests\Unit\Model\Operation;

use App\Model\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class DivideOperationTest
 * @package App\Tests\Unit\Model
 */
class DivideOperationTest extends TestCase
{
    private $operation = 'divide';

    public function test_calculate()
    {
        $operation = new Operation();
        
        $result = $operation->calculate([2,2], $this->operation);
        $this->assertEquals(1, $result);

        $result = $operation->calculate([2,1,2], $this->operation);
        $this->assertEquals(1, $result);

        $result = $operation->calculate([100,10], $this->operation);
        $this->assertEquals(10, $result);

        $result = $operation->calculate([8], $this->operation);
        $this->assertEquals(8, $result);
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
