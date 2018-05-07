<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\CreateTokenResponse;

class CreateTokenResponseTest extends TestCase
{
    private function getTokenInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\TokenModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

    public function testGetToken()
    {
        $tokenInstance = $this->getTokenInstance();
        $response = new CreateTokenResponse($tokenInstance);
        $this->assertSame($tokenInstance, $response->getToken());
    }
}
