<?php

namespace WARP\Response;

use WARP\Model\TokenModel;

class CreateTokenResponse
{
    /**
     * @var TokenModel
     */
    private $token;

    public function __construct(TokenModel $token)
    {
        $this->token = $token;
    }

    /**
     * @return TokenModel
     */
    public function getToken(): TokenModel
    {
        return $this->token;
    }
}
