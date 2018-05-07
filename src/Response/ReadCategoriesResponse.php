<?php

namespace WARP\Response;

use WARP\Model\CategoryModel;

class ReadCategoriesResponse
{
    /**
     * @var CategoryModel[]
     */
    private $categories;

    /**
     * @param CategoryModel[]
     */
    public function __construct(array $categories)
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
}
