<?php

namespace WARP\Model;

class MediaModel
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
     * @return int
     */
    public function getID(): int
    {
        return $this->apiResponse['id'];
    }
}