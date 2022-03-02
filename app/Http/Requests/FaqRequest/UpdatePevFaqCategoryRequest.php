<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevFaqCategoryRequest extends FormRequest
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
            'reordenamiento' => ['boolean'],
            'active' => ['boolean'],
            'position' => ['numeric'],
            'position_old' =>['numeric', 'nullable']
        ];
    }

    public function messages()
    {
        return [

            'position.numeric' => 'El campo :attribute debe ser numerico',
            'position_old.numeric' => 'El campo :attribute debe ser numerico',
            'active.boolean' => 'El campo :attribute debe ser boolean',
            'reordenamiento.boolean' => 'El campo :attribute debe ser boolean',


        ];

    }

    public function attributes(){
            return [

            'position' => 'posición',
            'active'  => 'activo',
            'reordenamiento' => 'reordenamiento',
            'position_old'  => 'posición vieja',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
