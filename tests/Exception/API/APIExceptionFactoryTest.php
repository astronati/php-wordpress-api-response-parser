<?php

namespace Tests\Exception\API;

use PHPUnit\Framework\TestCase;
use WARP\Exception\API\APIExceptionFactory;
use WARP\Exception\API\GenericAPIException;
use WARP\Exception\API\TermExistsAPIException;

class APIExceptionFactoryTest extends TestCase
{
    public function dataProvider()
    {
        return [
          ['{"code":"term_exists","message":"","data":{"status":400,"term_id":4000}}', TermExistsAPIException::class],
          ['{"code":"other","message":"","data":{"status":400}}', GenericAPIException::class],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param array $apiResponse
     * @param string $expectedClass
     */
    public function testGetResponse($apiResponse, $expectedClass)
    {
        $response = APIExceptionFactory::create($apiResponse);
        $this->assertSame($expectedClass, get_class($response));
    }
}
