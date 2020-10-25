<?php

namespace Tests\Exception\API;

use PHPUnit\Framework\TestCase;
use WARP\Exception\API\TermExistsAPIException;

class TermExistsAPIExceptionTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [4000],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $termID
     */
    public function testGetErrorCode($termID)
    {
        $exception = new TermExistsAPIException($termID);
        $this->assertEquals($termID, $exception->getTermID());
    }
}
