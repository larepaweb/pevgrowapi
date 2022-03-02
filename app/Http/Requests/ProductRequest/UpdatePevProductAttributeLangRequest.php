<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevProductAttributeLangRequest extends FormRequest
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

            'pev_product_attribute_id' => [ 'numeric'],
            'pev_lang_id' => [ 'numeric'],
            'name' => ['max:128'],

        ];
    }


    public function messages()
    {
        return [

            'pev_product_attribute_id.numeric' => 'El campo :attribute debe ser númerico',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser númerico',
            'name.max:128' => 'El campo :attribute excede el máximo de caracteres',
        ];

    }

    public function attributes(){
            return [

            'pev_product_attribute_id' => 'id de atributo de producto',
            'pev_lang_id' => 'id de idioma',
            'name' => 'nombre',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
