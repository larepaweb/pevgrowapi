<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevFaqCategoryRequest extends FormRequest
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
            'active' => ['boolean'],
            'position' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [

            'position.required' => 'El campo :attribute es obligatorio',
            'position.numeric' => 'El campo :attribute debe ser numerico',
            'active.boolean' => 'El campo :attribute debe ser boolean',

        ];

    }

    public function attributes(){
            return [

            'position' => 'posición',
            'active'  => 'activo',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
