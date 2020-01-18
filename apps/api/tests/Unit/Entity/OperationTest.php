<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class OperationTest
 * @package App\Tests\Unit\Entity
 */
class OperationTest extends TestCase
{

    public function test_getId()
    {
        $operation = $this->createMock(Operation::class);
        $operation->expects($this->any())
            ->method('getId')
            ->willReturn(1);

        $this->assertInternalType('int', $operation->getId());
    }

    public function test_setArguments()
    {
        $operation = new Operation();
        $operation->setArguments([1,2]);

        $this->assertEquals([1,2], $operation->getArguments());
    }

    public function test_getArguments()
    {
        $operation = new Operation();
        $operation->setArguments([1,2]);

        $this->assertInternalType('array', $operation->getArguments());
    }

    public function test_setType()
    {
        $operation = new Operation();
        $operation->setType('add');

        $this->assertEquals('add', $operation->getType());
    }

    public function test_getType()
    {
        $operation = new Operation();
        $operation->setType('add');

        $this->assertInternalType('string', $operation->getType());
    }

    public function test_setResult()
    {
        $operation = new Operation();
        $operation->setResult(0);

        $this->assertEquals(0, $operation->getResult());
    }

    public function test_getResult()
    {
        $operation = new Operation();
        $operation->setResult(1);

        $this->assertInternalType('integer', $operation->getResult());
    }
}
