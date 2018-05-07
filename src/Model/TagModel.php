<?php

namespace WARP\Model;

class TagModel
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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->apiResponse['name'];
    }
}
