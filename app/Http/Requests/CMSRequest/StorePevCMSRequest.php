<?php

namespace App\Http\Requests\CMSRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevCMSRequest extends FormRequest
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
            'active' => 'boolean',
            'position' => 'required|numeric',
            'deleted' => 'boolean',
        ];
    }

    public function attributes(){
            return [
            'active' => 'activo',
            'position' => 'posición',
            'deleted' => 'borrado'

            ];


    }

    public function messages()
    {
        return [

                'active.boolean' => 'El campo :attribute debe ser booleano',
                'position.required'  => 'El campo :attribute es obligatorio',
                'position.numeric' => 'El campo :attribute debe ser numerico',
                'deleted.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
