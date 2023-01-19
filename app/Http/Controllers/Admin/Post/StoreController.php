<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $newPost= $request->validated();
        $this->service->store($newPost);

        return redirect()->route('admin.post.index');
    }
}
