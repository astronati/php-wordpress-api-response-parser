<?php

namespace WARP\Model;

class TokenModel
{
    /**
     * @var array
     */
    private $apiResponse;

    public function __construct(array $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }

    /**
     * @return string
     */
    public function getJWTToken(): string
    {
        return $this->apiResponse['jwt_token'];
    }

    public function getTokenType(): string
    {
        return $this->apiResponse['token_type'];
    }
}
