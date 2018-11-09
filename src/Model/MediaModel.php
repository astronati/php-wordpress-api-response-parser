<?php

namespace WARP\Model;

class MediaModel
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
     * @param string $size
     * @return string|null
     */
    private function getSizeUrl($size): ?string
    {
        if (array_key_exists($size, $this->apiResponse['media_details']['sizes'])) {
            return $this->apiResponse['media_details']['sizes'][$size]['source_url'];
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->getSizeUrl('thumbnail');
    }

    /**
     * @return string|null
     */
    public function getMediumUrl(): ?string
    {
        return $this->getSizeUrl('medium');
    }

    /**
     * @return string|null
     */
    public function getMediumLargeUrl(): ?string
    {
        return $this->getSizeUrl('medium_large');
    }

    /**
     * @return string|null
     */
    public function getLargeUrl(): ?string
    {
        return $this->getSizeUrl('large');
    }

    /**
     * @return string|null
     */
    public function getFullUrl(): ?string
    {
        return $this->getSizeUrl('full');
    }
}
