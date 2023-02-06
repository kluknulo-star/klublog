<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        $user = auth()->user();
        $user->likedPosts()->detach($post->post_id);
        return redirect()->route('personal.like.index');
    }
}
