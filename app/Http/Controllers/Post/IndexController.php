<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('category')->paginate(6);
        $randomPosts = Post::get()->random(4);
        $popularPosts = Post::withCount('likedUsers')
            ->orderBy('liked_users_count','DESC')
            ->offset(0)
            ->limit(4)->get();

        return view('post.index', compact('posts', 'randomPosts', 'popularPosts'));
    }
}
