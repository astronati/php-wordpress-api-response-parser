<?php

namespace WARP\Response;

use WARP\Model\TagModel;

class CreateTagResponse
{
    /**
     * @var TagModel
     */
    private $tag;

    public function __construct(TagModel $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return TagModel
     */
    public function getTag(): TagModel
    {
        return $this->tag;
    }
}
