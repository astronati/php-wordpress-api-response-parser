<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Response\ReadCategoriesResponse;

class ReadCategoriesResponseTest extends TestCase
{
    private function getCategoryInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\CategoryModel')
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
    public function testGetCategories($count)
    {
        $instances = [];
        for ($i = 1; $i <= $count; $i++) {
            $instances[] = $this->getCategoryInstance();
        }
        $response = new ReadCategoriesResponse($instances);
        $this->assertSame($count, count($response->getCategories()));
    }
}
