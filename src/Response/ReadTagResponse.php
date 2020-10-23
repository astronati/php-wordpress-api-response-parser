<?php

namespace WARP\Response;

use WARP\Model\TagModel;

class ReadTagResponse
{
    /**
     * @var TagModel
     */
    private $tag;

    public function __construct(TagModel $tag)
    {
        $this->tag = $tag;
    }

    public function getTag(): TagModel
    {
        return $this->tag;
    }
}
