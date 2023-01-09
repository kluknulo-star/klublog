<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $updatedProperty = $request->validated();
        $tag->update($updatedProperty);
        return redirect()->route('admin.tag.show', ['tag' => $tag->tag_id]);
    }

}
