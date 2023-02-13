<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreCommentRequest $request, Post $post)
    {
        $newComment = $request->validated();
        $newComment['user_id'] = auth()->user()->user_id ?? 1;
        $newComment['post_id'] = $post->post_id;

        Comment::create($newComment);

        return redirect()->route('post.show', $post->post_id);
    }
}
