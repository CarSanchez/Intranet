<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => ['bail', 'required', 'max:50'],
            'lastName' => ['bail', 'required', 'max:100'],
            'date' => ['bail', 'required'],
            'route_img' => ['bail', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'email' => ['bail', 'max:100', Rule::unique('users', 'email')],
            $this->username() => ['bail', 'required', 'min:2', 'max:20', Rule::unique('users', 'user')],
            'password' => ['bail', 'required', 'min:6'],
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
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre debe ser maximo de 50 caracteres.',
            'lastName.required' => 'Los apellidos son requeridos.',
            'lastName.max' => 'los apellidos superan los 100 caracteres.',
            'date.required' => 'La fecha de nacimiento es requerida.',
            'email.max' => 'El correo supera los 100 carcteres.',
            'email.unique' => 'Este correo ya existe, intente con otro o inicie sesión.',
            $this->username().'required' => 'El usuario es requerido.',
            $this->username().'min' => 'El usuario minimo debe ser de 2 caracteres.',
            $this->username().'max' => 'El usuario debe ser maximo de 20 caracteres.',
            $this->username().'unique' => 'Este usuario ya existe, intente con otro o inicie sesión.',
            'password.required' => 'El password es requerido.',
            'password.min' => 'El password debe ser minimo de 6 caracteres.'
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
