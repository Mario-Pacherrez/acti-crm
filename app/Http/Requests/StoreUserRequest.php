<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required|string|max:150|unique:users,nickname',
            'name' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|max:150|unique:users,email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'El nombre de usuario es requerido.',
            'name.required' => 'El campo Nombre(s) es requerido.',
            'lastname.required' => 'El campo Apellidos es requerido.',
        ];
    }
}