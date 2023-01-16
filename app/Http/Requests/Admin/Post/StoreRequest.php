<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'category_id' => 'required|integer|exists:categories,category_id',
            'content' => 'required|string',
            'main_image' => 'required|file',
            'preview_image' => 'required|file',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,tag_id',
        ];
    }

//    protected function failedValidation(Validator $validator)
//    {
//        $errors = $validator->errors()->messages();
//        throw new HttpResponseException(response()->json(['errors' => $errors], 422));
//    }
}
