<?php

namespace WARP\Model;

class PostModel
{
    const DRAFT = 'draft';
    const PENDING = 'pending';
    const PUBLISH = 'publish';

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

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->apiResponse['title']['rendered'];
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->apiResponse['content']['rendered'];
    }

    public function getSafeContent(): string
    {
        return preg_replace("/(<script>.*?<\/script>)/i", "", $this->apiResponse['content']['rendered']);
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->apiResponse['link'];
    }

    public function getAuthor(): int
    {
        return $this->apiResponse['author'];
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return \DateTime::createFromFormat(\DateTimeInterface::W3C, $this->apiResponse['date_gmt'] . '+00:00');
    }
}
