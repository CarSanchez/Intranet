<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => ['bail', 'required', 'max:100', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
            'ext' => ['bail', 'required', 'min:4', Rule::unique('users', 'ext')->ignore(Auth::user()->id)],
            $this->username() => ['bail', 'required', 'min:2', 'max:20', Rule::unique('users', 'user')->ignore(Auth::user()->id)],
            'department' => ['bail', 'required'],
            'role' => ['bail',  Auth::user()->role == 'sa' ? 'required' : ''],
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
            'email.required' => 'El correo es obligatorio.',
            'email.max' => 'El correo supera los 100 carcteres.',
            'email.unique' => 'Este correo ya existe, intente con otro.',
            'ext.required' => 'La extención es requerida.',
            'ext.min' => 'La extención debe ser minimo de 4 caracteres.',
            'ext.unique' => 'La extención ya esta ocupada intente con otra.',
            $this->username().'.required' => 'El usuario es requerido.',
            $this->username().'.min' => 'El usuario minimo debe ser de 2 caracteres.',
            $this->username().'.max' => 'El usuario debe ser maximo de 20 caracteres.',
            $this->username().'.unique' => 'Este usuario ya existe, intente con otro.',
            'department.required' => 'El departamento es requerido.',
            'role.required' => 'El nivel del perfil es requerido.',
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
