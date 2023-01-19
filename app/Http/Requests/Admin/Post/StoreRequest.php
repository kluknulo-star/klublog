<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

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
            'main_image' => 'required|image',
            'preview_image' => 'required|image',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,tag_id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Идентификатор должен быть целым числом',
            'category_id.exists' => 'Идентификатор должен быть в бд',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.image' => 'Необходимо выбрать изображение',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.image' => 'Необходимо выбрать изображение',
            'tag_ids.array' => 'Тэги должны быть переданы массивом',
        ];
    }

//    protected function failedValidation(Validator $validator)
//    {
//        $errors = $validator->errors()->messages();
//        throw new HttpResponseException(response()->json(['errors' => $errors], 422));
//    }
}
