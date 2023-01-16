<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $updatedProperty = $request->validated();
        $post->update($updatedProperty);
        return redirect()->route('admin.post.show', ['post' => $post->post_id]);
    }

}
