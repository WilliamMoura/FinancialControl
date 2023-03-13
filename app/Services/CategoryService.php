<?php
declare(strict_types = 1);

namespace App\Services;

use App\Models\Category;

class CategoryService extends ServiceBase
{
    public function __construct(Category $category)
    {           
        parent::__construct($category);
    }
}