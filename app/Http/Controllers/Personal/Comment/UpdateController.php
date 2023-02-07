<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateCommentRequest;
use App\Models\Comment;

class UpdateController extends Controller
{
    public function __invoke(UpdateCommentRequest $request, Comment $comment)
    {
        $requestComment = $request->validated();
        $comment->update($requestComment);
        return redirect()->route('personal.comment.index');
    }
}
