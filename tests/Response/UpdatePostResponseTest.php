<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\UpdatePostResponse;

class UpdatePostResponseTest extends TestCase
{
    private function getPostInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\PostModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

    public function testGetPost()
    {
        $postInstance = $this->getPostInstance();
        $response = new UpdatePostResponse($postInstance);
        $this->assertSame($postInstance, $response->getPost());
    }
}
