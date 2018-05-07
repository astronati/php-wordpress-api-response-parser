<?php

namespace WARP\Response;

use WARP\Model\PostModel;

class ReadPostsResponse
{
    /**
     * @var PostModel[]
     */
    private $posts;

    /**
     * @param PostModel[]
     */
    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return PostModel[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }
}
