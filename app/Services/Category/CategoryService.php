<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\Base\BaseCrudService;
use App\Services\Category\Contracts\CategoryServiceInterface;

class CategoryService extends BaseCrudService implements CategoryServiceInterface
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return Category::class;
    }
}
