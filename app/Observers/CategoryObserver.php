<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;

class CategoryObserver
{
    public function creating(Category $category)
    {

    }
}
