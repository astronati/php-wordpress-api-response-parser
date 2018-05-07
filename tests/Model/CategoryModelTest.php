<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WARP\Model\CategoryModel;

class CategoryModelTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [1],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $id
     */
    public function testGetID($id)
    {
        $model = new CategoryModel(['id' => $id]);
        $this->assertEquals($id, $model->getID());
    }
}
