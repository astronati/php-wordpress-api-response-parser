<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\ReadTagsResponse;

class ReadTagsResponseTest extends TestCase
{
    private function getTagInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\TagModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

    public function dataProvider()
    {
        return [
          [2],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $count
     */
    public function testGetTags($count)
    {
        $instances = [];
        for ($i = 1; $i <= $count; $i++) {
            $instances[] = $this->getTagInstance();
        }
        $response = new ReadTagsResponse($instances);
        $this->assertSame($count, count($response->getTags()));
    }
}
