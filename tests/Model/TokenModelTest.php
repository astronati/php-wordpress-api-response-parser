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
    public function testGetJWTToken($token)
    {
        $model = new TokenModel(['jwt_token' => $token]);
        $this->assertEquals($token, $model->getJWTToken());
    }
    public function tokenTypeDataProvider()
    {
        return [
            ['jwt'],
        ];
    }

    /**
     * @dataProvider tokenTypeDataProvider
     * @param string $type
     */
    public function testGetTokenType($type)
    {
        $model = new TokenModel(['token_type' => $type]);
        $this->assertEquals($type, $model->getTokenType());
    }
}
