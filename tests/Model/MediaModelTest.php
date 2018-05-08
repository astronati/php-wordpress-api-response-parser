<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WARP\Model\MediaModel;

class MediaModelTest extends TestCase
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
        $model = new MediaModel(['id' => $id]);
        $this->assertEquals($id, $model->getID());
    }

    public function thumbnailUrlDataProvider()
    {
        return [
          ['http://www.site.it/image.jpg'],
        ];
    }

    /**
     * @dataProvider thumbnailUrlDataProvider
     * @param string $sourceUrl
     */
    public function testGetThumbnailUrl($sourceUrl)
    {
        $model = new MediaModel(['media_details' => ['sizes' => ['thumbnail' => ['source_url' => $sourceUrl]]]]);
        $this->assertEquals($sourceUrl, $model->getThumbnailUrl());
    }
}
