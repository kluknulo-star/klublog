<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $newTitle = $request->validated();
        $category = Category::firstOrCreate($newTitle);
        return redirect()->route('admin.category.index');
    }
}
