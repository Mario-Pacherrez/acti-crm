<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientLeadRequest extends FormRequest
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
            'channels' => 'required',
            'users' => 'required',
            'names' => 'required|string|max:150',
            'email' => 'required|string|max:150|unique:clients_leads,email',
            'phone' => 'required|string|max:100',
            'courses_name' => 'required|string|max:100',

        ];
    }

    public function messages()
    {
        return [
            'names.required' => 'El nombre y apellido es requerido.',
        ];
    }
}