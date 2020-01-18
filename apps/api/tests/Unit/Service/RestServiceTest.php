<?php

namespace App\Tests\Unit\Services;


use App\Service\RestService;
use PHPUnit\Framework\TestCase;

/**
 * Class RestServiceTest
 * @package App\Tests\Unit\Service
 */
class RestServiceTest extends TestCase
{
    public function test___construct()
    {
        $restService = $this->getMockBuilder(RestService::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->assertInstanceOf(RestService::class, $restService);

    }

}