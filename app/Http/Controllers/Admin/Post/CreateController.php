<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::paginate(20);
        $tags = Tag::paginate(20);

        return view('admin.post.create', compact('categories', 'tags'));
    }
}
