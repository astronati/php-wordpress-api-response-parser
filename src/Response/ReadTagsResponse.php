<?php

namespace WARP\Response;

use WARP\Model\TagModel;

class ReadTagsResponse
{
    /**
     * @var TagModel[]
     */
    private $tags;

    /**
     * @param TagModel[]
     */
    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return TagModel[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }
}
