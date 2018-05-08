<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WARP\Model\TagModel;

class TagModelTest extends TestCase
{
    public function IDDataProvider()
    {
        return [
          [1],
        ];
    }

    /**
     * @dataProvider IDDataProvider
     * @param int $id
     */
    public function testGetID($id)
    {
        $model = new TagModel(['id' => $id]);
        $this->assertEquals($id, $model->getID());
    }

    public function nameDataProvider()
    {
        return [
          ['#tag'],
        ];
    }

    /**
     * @dataProvider nameDataProvider
     * @param string $name
     */
    public function testGetName($name)
    {
        $model = new TagModel(['name' => $name]);
        $this->assertEquals($name, $model->getName());
    }

    public function slugDataProvider()
    {
        return [
          ['tag'],
        ];
    }

    /**
     * @dataProvider slugDataProvider
     * @param string $slug
     */
    public function testGetSlug($slug)
    {
        $model = new TagModel(['slug' => $slug]);
        $this->assertEquals($slug, $model->getSlug());
    }
}
