<?php

namespace WARP\Response;

use WARP\Model\PostModel;

class CreatePostResponse
{
    /**
     * @var PostModel
     */
    private $post;

    public function __construct(PostModel $post)
    {
        $this->post = $post;
    }

    /**
     * @return PostModel
     */
    public function getPost(): PostModel
    {
        return $this->post;
    }
}
