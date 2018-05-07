<?php

namespace WARP\Response;

use WARP\Model\TokenModel;

class ReadTagsResponse
{
    /**
     * @var TokenModel[]
     */
    private $tags;

    /**
     * @param TokenModel[]
     */
    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return TokenModel[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }
}
