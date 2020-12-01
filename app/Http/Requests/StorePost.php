<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => ['required','min:6','max:65'],
            'body' => ['required','min:6 '],
            'description' => ['required', 'max:100'],
            'category_id' => ['required'],
            'is_anon' => ['required'],
            'image' => ['max:1000'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tenés que escribir un titulo',
            'title.min' => 'El titulo no puede contener menos de 6 caracteres',
            'title.max' => 'El titulo no puede contener mas de 65 caracteres',
            'body.required' => 'Tenés que escribir algo',
            'body.min' => 'Tu mansaje no puede contener menos de 6 caracteres',
            'description.required' => 'Tenés que escribir algo',
            'description.max' => 'La descripcion no puede contener mas de 100 caracteres',
            'category.required' => 'Tenés que elegir una categoria valida',
            'is_anon.max' => 'Que intentaste hacer?',
            'is_anon.requird'=>'El post es anonimo si o no?',
            'image.max' => 'La URL de la imagen es muy grande',
        ];
    }
}
