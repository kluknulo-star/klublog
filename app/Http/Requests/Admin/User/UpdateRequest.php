<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'string',
            'email' => 'email',
            'password' => 'string',
            'role_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Имя должно быть строкой',
            'email.email' => 'Почта должна сответсвовать формату email@domen.ru',
            'email.unique' => 'Пользователь с таким именем уже существует',
            'password.string' => 'Пароль должен быть строкой',
        ];
    }
}
