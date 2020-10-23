<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\ReadTagResponse;

class ReadTagResponseTest extends TestCase
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
        $tag =  $this->getTagInstance();
        $response = new ReadTagResponse($tag);
        $this->assertSame($tag, $response->getTag());
    }
}
