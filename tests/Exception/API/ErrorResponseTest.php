<?php

namespace Tests\Exception\API;

use PHPUnit\Framework\TestCase;
use WARP\Exception\API\ErrorResponse;

class ErrorResponseTest extends TestCase
{
    public function getErrorCodeDataProvider()
    {
        return [
          ['{"code":"test"}', 'test'],
        ];
    }

    /**
     * @dataProvider getErrorCodeDataProvider
     * @param string $response
     * @param string $expectedResult
     */
    public function testGetErrorCode($response, string $expectedResult)
    {
        $errorResponse = new ErrorResponse($response);
        $this->assertEquals($expectedResult, $errorResponse->getErrorCode());
    }

    public function getHttpStatusDataProvider()
    {
        return [
            ['{"data":{"status":404}}', 404],
        ];
    }

    /**
     * @dataProvider getHttpStatusDataProvider
     * @param string $response
     * @param string $expectedResult
     */
    public function testGetHttpStatus($response, string $expectedResult)
    {
        $errorResponse = new ErrorResponse($response);
        $this->assertEquals($expectedResult, $errorResponse->getHttpStatus());
    }

    public function getMessageDataProvider()
    {
        return [
            ['{"message":"this is a message"}', "this is a message"],
        ];
    }

    /**
     * @dataProvider getMessageDataProvider
     * @param string $response
     * @param string $expectedResult
     */
    public function testGetMessage($response, string $expectedResult)
    {
        $errorResponse = new ErrorResponse($response);
        $this->assertEquals($expectedResult, $errorResponse->getMessage());
    }

    public function getTermIDDataProvider()
    {
        return [
            ['{"data":{"term_id":233}}', 233],
        ];
    }

    /**
     * @dataProvider getTermIDDataProvider
     * @param string $response
     * @param string $expectedResult
     */
    public function testGetTermID($response, string $expectedResult)
    {
        $errorResponse = new ErrorResponse($response);
        $this->assertEquals($expectedResult, $errorResponse->getTermID());
    }
}
