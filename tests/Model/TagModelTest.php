<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WARP\Model\TagModel;

class TagModelTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [1, 'this is a tag'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $id
     * @param string $name
     */
    public function testGetID($id, $name)
    {
        $model = new TagModel(['id' => $id, 'name' => $name]);
        $this->assertEquals($id, $model->getID());
    }

    /**
     * @dataProvider dataProvider
     * @param int $id
     * @param string $name
     */
    public function testGetName($id, $name)
    {
        $model = new TagModel(['id' => $id, 'name' => $name]);
        $this->assertEquals($name, $model->getName());
    }
}
