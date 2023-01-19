<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store(array $newPost)
    {
        try {
            DB::beginTransaction();
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
            abort(500, 'Ошибка при создании поста');
        }
    }

    public function update(array $updatedPost, Post $post)
    {
        try {
            DB::beginTransaction();

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
            return $post;
        } catch (\Exception $exception) {
            DB::rollBack();

            abort(404);
        }

    }
}
