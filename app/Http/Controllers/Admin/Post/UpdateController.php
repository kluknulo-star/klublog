<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        try {
            DB::beginTransaction();
            $updatedPost = $request->validated();

            $tagIds = $updatedPost['tag_ids'];
            unset($updatedPost['tag_ids']);

            if ($post->category_id == $updatedPost['category_id']) {
                unset($updatedPost['category_id']);
            }
            if ($post->title === $updatedPost['title']) {
                unset($updatedPost['title']);
            }
            if ($post->content === $updatedPost['content']) {
                unset($updatedPost['content']);
            }

            if (array_key_exists('preview_image', $updatedPost))
            {
                $updatedPost['preview_image'] = Storage::disk('public')->put('files/images', $updatedPost['preview_image']);
            }

            if (array_key_exists('main_image', $updatedPost))
            {
                $updatedPost['main_image'] = Storage::disk('public')->put('files/images', $updatedPost['main_image']);
            }

            $post->tags()->sync($tagIds);
            $post->update($updatedPost);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            abort(404);
        }


        return redirect()->route('admin.post.show', ['post' => $post->post_id]);
    }

}
