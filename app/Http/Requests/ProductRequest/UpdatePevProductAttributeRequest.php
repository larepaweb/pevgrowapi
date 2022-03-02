<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevProductAttributeRequest extends FormRequest
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

            'pev_product_att_group_id' => ['numeric'],
            'position' => ['numeric'],
            'deleted' => ['boolean'],

        ];
    }


    public function messages()
    {
        return [
            'pev_product_att_group_id.numeric' => 'El campo :attribute debe ser númerico',
            'position.numeric' => 'El campo :attribute debe ser númerico',
            'deleted.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    public function attributes(){
            return [

            'pev_product_att_group_id' => 'id de grupo de atributos de producto',
            'position' => 'posición',
            'deleted' => 'borrado',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
