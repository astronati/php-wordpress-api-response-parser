<?php

namespace WARP\Response;

use WARP\Model\MediaModel;

class ReadMediaResponse
{
    /**
     * @var MediaModel[]
     */
    private $media;

    /**
     * @param MediaModel[]
     */
    public function __construct(array $media)
    {
        $this->media = $media;
    }

    /**
     * @return MediaModel[]
     */
    public function getMedia(): array
    {
        return $this->media;
    }
}
