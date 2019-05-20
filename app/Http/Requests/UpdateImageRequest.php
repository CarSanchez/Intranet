<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateImageRequest extends FormRequest
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
            'route_img' => ['bail', 'required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
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
            'route_img.required' => 'Seleccionar el archivo es requerido.',
        ];
    }
}
