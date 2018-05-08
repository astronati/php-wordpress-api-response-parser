<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use WARP\Model\TokenModel;

class TokenModelTest extends TestCase
{
    public function tokenDataProvider()
    {
        return [
          ['abc123'],
        ];
    }

    /**
     * @dataProvider tokenDataProvider
     * @param string $token
     */
    public function testGetToken($token)
    {
        $model = new TokenModel(['token' => $token]);
        $this->assertEquals($token, $model->getToken());
    }
}
