<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'role_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Имя должно быть строкой',
            'name.required' => 'Поле должно быть заполнено',
            'email.email' => 'Почта должна сответсвовать формату email@domen.ru',
            'email.unique' => 'Пользователь с таким именем уже существует',
            'email.required' => 'Поле должно быть заполнено',
            'password.string' => 'Пароль должен быть строкой',
            'password.required' => 'Поле должно быть заполнено',
            'role_id.required' => 'Поле должно быть заполнено',
        ];
    }
}
