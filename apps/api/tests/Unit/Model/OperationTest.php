<?php

namespace App\Tests\Unit\Model;

use App\Model\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class OperationTest
 * @package App\Tests\Unit\Model
 */
class OperationTest extends TestCase
{

    public function test_calculate_exception()
    {
        $this->expectException(\Exception::class);

        $operation = new Operation();
        $result = $operation->calculate([1,2], 'error');

        $this->assertInstanceOf(\Exception::class, $result);
    }

}
