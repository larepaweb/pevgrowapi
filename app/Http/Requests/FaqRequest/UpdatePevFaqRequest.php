<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevFaqRequest extends FormRequest
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
            'pev_faq_category_id' => ['numeric'],
            'active' => ['boolean'],
            'position' => ['numeric'],
            'position_old' =>['numeric', 'nullable']
        ];
    }

     public function messages()
    {
        return [

            'pev_faq_category_id.numeric' => 'El campo :attribute debe ser numerico',
            'position.numeric' => 'El campo :attribute debe ser numerico',
            'active.boolean' => 'El campo :attribute debe ser booleano',
            'reordenamiento.boolean' => 'El campo :attribute debe ser booleano',
            'position_old.numeric' => 'El campo :attribute debe ser numerico',

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
