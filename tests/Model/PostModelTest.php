<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WARP\Model\PostModel;

class PostModelTest extends TestCase
{
    private function getCategoryInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\CategoryModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

    private function getMediaInstance()
    {
        $instance = $this->getMockBuilder('WARP\Model\MediaModel')
          ->disableOriginalConstructor()
          ->getMock();
        return $instance;
    }

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
          [1, 2],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $id
     * @param int $categoriesCount
     */
    public function testGetID($id, $categoriesCount)
    {
        $model = new PostModel(['id' => $id]);
        $this->assertEquals($id, $model->getID());
    }

    /**
     * @dataProvider dataProvider
     * @param int $id
     * @param int $categoriesCount
     */
    public function testGetCategories($id, $categoriesCount)
    {
        $model = new PostModel(['id' => $id]);
        $instances = [];
        for ($i = 1; $i <= $categoriesCount; $i++) {
            $instances[] = $this->getCategoryInstance();
        }
        $model->setCategories($instances);
        $this->assertEquals($categoriesCount, count($model->getCategories()));
    }

    /**
     * @dataProvider dataProvider
     * @param int $id
     * @param int $mediaCount
     */
    public function testGetMedia($id, $mediaCount)
    {
        $model = new PostModel(['id' => $id]);
        $instances = [];
        for ($i = 1; $i <= $mediaCount; $i++) {
            $instances[] = $this->getMediaInstance();
        }
        $model->setMedia($instances);
        $this->assertEquals($mediaCount, count($model->getMedia()));
    }

    /**
     * @dataProvider dataProvider
     * @param int $id
     * @param int $tagsCount
     */
    public function testGetTags($id, $tagsCount)
    {
        $model = new PostModel(['id' => $id]);
        $instances = [];
        for ($i = 1; $i <= $tagsCount; $i++) {
            $instances[] = $this->getTagInstance();
        }
        $model->setTags($instances);
        $this->assertEquals($tagsCount, count($model->getTags()));
    }
}
