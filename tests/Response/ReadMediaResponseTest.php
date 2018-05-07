<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\ReadMediaResponse;

class ReadMediaResponseTest extends TestCase
{
    private function getMediaInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\MediaModel')
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
    public function testGetMedia($count)
    {
        $instances = [];
        for ($i = 1; $i <= $count; $i++) {
            $instances[] = $this->getMediaInstance();
        }
        $response = new ReadMediaResponse($instances);
        $this->assertSame($count, count($response->getMedia()));
    }
}
