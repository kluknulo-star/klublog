<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $date = $date->translatedFormat('F j, Y • H:i');

        $relatedPosts = Post::withCount('likedUsers')
            ->with('category')
            ->where('category_id', '=', $post->category_id)
            ->where('post_id', '!=', $post->post_id)
            ->orderBy('liked_users_count', 'DESC')
            ->take(3)
            ->get();
        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
