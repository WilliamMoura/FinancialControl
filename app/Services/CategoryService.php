<?php
declare(strict_types = 1);

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService extends ServiceBase
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function all(Request $request)
    {
        return $this->model->with(['typeCategory'])
        ->get();
    }
}
