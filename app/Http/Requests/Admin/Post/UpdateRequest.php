<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string',
            'category_id' => 'nullable|integer|numeric|exists:categories,category_id',
            'content' => 'nullable|string',
            'main_image' => 'nullable|file',
            'preview_image' => 'nullable|file',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,tag_id',
        ];
    }
}
