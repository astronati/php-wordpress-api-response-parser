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
    public function getToken(): string
    {
        return $this->apiResponse['token'];
    }
}
