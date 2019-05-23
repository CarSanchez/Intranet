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
            'route_img' => ['bail',
                'required',
                'image',
                'mimes:jpg,png,jpeg,gif,svg',
                'max:2000', /* <- kilobytes a megabytes 1000 = 1Mb */
                'dimensions:min_width=256,min_height=256,max_width=1920,max_height=1080'],
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
            'route_img.image' => 'El archivo debe ser una imagen.',
            'route_img.mimes' => 'El archivo debe ser formato JPG o PNG o JPEG o GIF o SVG.',
            'route_img.max' => 'El archivo debe tener un tamaño menor o igual a 2 Megabytes.',
            'route_img.dimensions' => 'La resoculción del archivo debe ser min: 100 x 100, max: 1920 x 1080',
        ];
    }
}
