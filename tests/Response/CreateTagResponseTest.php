<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\CreateTagResponse;

class CreateTagResponseTest extends TestCase
{
    private function getTagInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\TagModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

    public function testGetTag()
    {
        $tagInstance = $this->getTagInstance();
        $response = new CreateTagResponse($tagInstance);
        $this->assertSame($tagInstance, $response->getTag());
    }
}
