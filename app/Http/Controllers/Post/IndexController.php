<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('category')->paginate(6);

        $randomPosts = Post::inRandomOrder('1234')->paginate(4);;
        $popularPosts = Post::orderBy('liked_users_count','DESC')->paginate(3);

        return view('post.index', compact('posts', 'randomPosts', 'popularPosts'));
    }
}
