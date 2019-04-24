<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            $this->username() => 'bail|required|string|min:2|max:20',
            'password' => 'bail|required|min:6',
        ];
    }

    /**
     * Get the messages of errors of validations
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user.required' => 'El usuario es requerido.',
            'user.min' => 'El usuario debe ser minimo de 2 caracteres.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe ser minimo de 6 caracteres.',
        ];
    }

    /**
     * Get the param of the camp for username.
     *
     * @return array
     */
    public function username()
    {
        return 'user';
    }
}
