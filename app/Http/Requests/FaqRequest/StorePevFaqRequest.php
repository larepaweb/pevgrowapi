<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevFaqRequest extends FormRequest
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
            'pev_faq_category_id' => ['required', 'numeric'],
            'active' => ['boolean'],
            'position' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [

            'pev_faq_category_id.required' => 'El campo :attribute es obligatorio',
            'pev_faq_category_id.numeric' => 'El campo :attribute debe ser numerico',
            'position.required' => 'El campo :attribute es obligatorio',
            'position.numeric' => 'El campo :attribute debe ser numerico',
            'active.boolean' => 'El campo :attribute debe ser booleano',

        ];

    }

    public function attributes(){
            return [

            'pev_faq_category_id' => 'id de grupos de atributos de producto',
            'active' => 'activo',
            'position' => 'posición',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }


}
