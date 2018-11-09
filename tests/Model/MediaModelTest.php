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
          [null],
        ];
    }

    /**
     * @dataProvider thumbnailUrlDataProvider
     * @param string $sourceUrl
     */
    public function testGetThumbnailUrl($sourceUrl)
    {
        $sizes = $sourceUrl ? ['thumbnail' => ['source_url' => $sourceUrl]] : [];
        $model = new MediaModel(['media_details' => ['sizes' => $sizes]]);
        $this->assertEquals($sourceUrl, $model->getThumbnailUrl());
    }

    public function mediumUrlDataProvider()
    {
        return [
          ['http://www.site.it/image.jpg'],
          [null],
        ];
    }

    /**
     * @dataProvider mediumUrlDataProvider
     * @param string $sourceUrl
     */
    public function testGetMediumUrl($sourceUrl)
    {
        $sizes = $sourceUrl ? ['medium' => ['source_url' => $sourceUrl]] : [];
        $model = new MediaModel(['media_details' => ['sizes' => $sizes]]);
        $this->assertEquals($sourceUrl, $model->getMediumUrl());
    }

    public function mediumLargeUrlDataProvider()
    {
        return [
          ['http://www.site.it/image.jpg'],
          [null],
        ];
    }

    /**
     * @dataProvider mediumLargeUrlDataProvider
     * @param string $sourceUrl
     */
    public function testGetMediumLargeUrl($sourceUrl)
    {
        $sizes = $sourceUrl ? ['medium_large' => ['source_url' => $sourceUrl]] : [];
        $model = new MediaModel(['media_details' => ['sizes' => $sizes]]);
        $this->assertEquals($sourceUrl, $model->getMediumLargeUrl());
    }

    public function largeUrlDataProvider()
    {
        return [
          ['http://www.site.it/image.jpg'],
          [null],
        ];
    }

    /**
     * @dataProvider largeUrlDataProvider
     * @param string $sourceUrl
     */
    public function testGetLargeUrl($sourceUrl)
    {
        $sizes = $sourceUrl ? ['large' => ['source_url' => $sourceUrl]] : [];
        $model = new MediaModel(['media_details' => ['sizes' => $sizes]]);
        $this->assertEquals($sourceUrl, $model->getLargeUrl());
    }

    public function fullUrlDataProvider()
    {
        return [
          ['http://www.site.it/image.jpg'],
          [null],
        ];
    }

    /**
     * @dataProvider fullUrlDataProvider
     * @param string $sourceUrl
     */
    public function testGetFullUrl($sourceUrl)
    {
        $sizes = $sourceUrl ? ['full' => ['source_url' => $sourceUrl]] : [];
        $model = new MediaModel(['media_details' => ['sizes' => $sizes]]);
        $this->assertEquals($sourceUrl, $model->getFullUrl());
    }
}
