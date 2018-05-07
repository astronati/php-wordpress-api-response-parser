<?php

namespace WARP\Model;

class PostModel
{
    const DRAFT = 'draft';
    const PENDING = 'pending';

    /**
     * @var array
     */
    private $apiResponse;

    /**
     * @var CategoryModel[]
     */
    private $categories = [];

    /**
     * @var MediaModel[]
     */
    private $media = [];

    /**
     * @var TagModel[]
     */
    private $tags = [];

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
     * @param CategoryModel[] $categories
     */
    public function setCategories(array $categories = array())
    {
        $this->categories = $categories;
    }

    /**
     * @return CategoryModel[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param MediaModel[] $media
     */
    public function setMedia(array $media = array())
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

    /**
     * @param TagModel[] $tags
     */
    public function setTags(array $tags = array())
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
