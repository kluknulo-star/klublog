<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $updatedProperty = $request->validated();
        $category->update($updatedProperty);
        return redirect()->route('admin.category.show', ['category' => $category->category_id]);
    }

}
