<?php

namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        $categories = Category::paginate(20);
        $tagsInPost = $post->tags;
        $tags = Tag::paginate(20);
        return view('admin.post.edit', compact('post', 'categories', 'tags', 'tagsInPost'));
    }

}
