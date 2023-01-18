<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $newPost= $request->validated();
            $tagIds = $newPost['tag_ids'];
            unset($newPost['tag_ids']);

            $newPost['preview_image'] = Storage::disk('public')->put('files/images', $newPost['preview_image']);
            $newPost['main_image'] = Storage::disk('public')->put('files/images', $newPost['main_image']);

            $post = Post::firstOrCreate($newPost);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollBack();
            abort(404, 'Ошибка при создании поста');
        }



        return redirect()->route('admin.post.index');
    }
}
