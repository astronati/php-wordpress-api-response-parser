<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\ReadPostsResponse;

class ReadPostsResponseTest extends TestCase
{
    private function getPostInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\PostModel')
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
    public function testGetPosts($count)
    {
        $instances = [];
        for ($i = 1; $i <= $count; $i++) {
            $instances[] = $this->getPostInstance();
        }
        $response = new ReadPostsResponse($instances);
        $this->assertSame($count, count($response->getPosts()));
    }
}
