<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WARP\Model\MediaModel;

class MediaModelTest extends TestCase
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
        $model = new MediaModel(['id' => $id]);
        $this->assertEquals($id, $model->getID());
    }
}
