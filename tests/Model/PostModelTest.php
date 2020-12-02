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
        $model = new PostModel(['id' => $id]);
        $this->assertEquals($id, $model->getID());
    }

    public function entitiesDataProvider()
    {
        return [
          [3],
        ];
    }

    /**
     * @dataProvider entitiesDataProvider
     * @param int $categoriesCount
     */
    public function testGetCategories($categoriesCount)
    {
        $model = new PostModel([]);
        $instances = [];
        for ($i = 1; $i <= $categoriesCount; $i++) {
            $instances[] = $this->getCategoryInstance();
        }
        $model->setCategories($instances);
        $this->assertEquals($categoriesCount, count($model->getCategories()));
    }

    /**
     * @dataProvider entitiesDataProvider
     * @param int $mediaCount
     */
    public function testGetMedia($mediaCount)
    {
        $model = new PostModel([]);
        $instances = [];
        for ($i = 1; $i <= $mediaCount; $i++) {
            $instances[] = $this->getMediaInstance();
        }
        $model->setMedia($instances);
        $this->assertEquals($mediaCount, count($model->getMedia()));
    }

    /**
     * @dataProvider entitiesDataProvider
     * @param int $tagsCount
     */
    public function testGetTags($tagsCount)
    {
        $model = new PostModel([]);
        $instances = [];
        for ($i = 1; $i <= $tagsCount; $i++) {
            $instances[] = $this->getTagInstance();
        }
        $model->setTags($instances);
        $this->assertEquals($tagsCount, count($model->getTags()));
    }

    public function titleDataProvider()
    {
        return [
          [3],
        ];
    }

    /**
     * @dataProvider titleDataProvider
     * @param string $title
     */
    public function testGetTitle($title)
    {
        $model = new PostModel(['title' => ['rendered' => $title]]);
        $this->assertEquals($title, $model->getTitle());
    }

    public function contentDataProvider()
    {
        return [
          ['<html><body><script>It should be part</script><p>Other thing</p></body></html>', '<html><body><script>It should be part</script><p>Other thing</p></body></html>'],
        ];
    }

    /**
     * @dataProvider contentDataProvider
     * @param string $content
     */
    public function testGetContent($content, $expectedContent)
    {
        $model = new PostModel(['content' => ['rendered' => $content]]);
        $this->assertEquals($expectedContent, $model->getContent());
    }

    public function safeContentDataProvider()
    {
        return [
            ['<html><body><script>It should be part</script><p>Other thing</p></body></html>', '<html><body><p>Other thing</p></body></html>'],
            ['<html><body><script>It should be part</script><p>Other thing</p><script>It should be part</script></body></html>', '<html><body><p>Other thing</p></body></html>'],
            ['<html><body><p>Other thing</p></body></html>', '<html><body><p>Other thing</p></body></html>'],
        ];
    }

    /**
     * @dataProvider safeContentDataProvider
     * @param string $content
     * @param string $expectedContent
     */
    public function testGetSafeContent($content, $expectedContent)
    {
        $model = new PostModel(['content' => ['rendered' => $content]]);
        $this->assertEquals($expectedContent, $model->getSafeContent());

    }

    public function linkDataProvider()
    {
        return [
          ['http://www.website.com/post/id'],
        ];
    }

    /**
     * @dataProvider linkDataProvider
     * @param string $link
     */
    public function testGetLink($link)
    {
        $model = new PostModel(['link' => $link]);
        $this->assertEquals($link, $model->getLink());
    }

    public function dateDataProvider()
    {
        return [
          ['2017-02-02T00:00:00', '2017-02-02T00:00:00+00:00'],
        ];
    }

    /**
     * @dataProvider dateDataProvider
     * @param string $date
     * @param string $expectedDate
     */
    public function testGetDate($date, $expectedDate)
    {
        $model = new PostModel(['date_gmt' => $date]);
        $this->assertEquals($expectedDate, $model->getDate()->format(\DateTime::W3C));
    }
}
