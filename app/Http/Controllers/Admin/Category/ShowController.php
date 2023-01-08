<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories = Category::query()->paginate(10);
        dd($category);
//        return view('admin.category.index', compact('categories'));
    }

}
