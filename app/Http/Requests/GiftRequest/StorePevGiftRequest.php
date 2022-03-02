<?php

namespace App\Http\Requests\GiftRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevGiftRequest extends FormRequest
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
            'pev_product_id' => 'required|numeric',
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
            'active' => 'boolean',
            'deleted' => 'boolean',
        ];
    }

    public function attributes(){
            return [

            'pev_product_id' => 'id de producto',
            'price_from'=> 'precio origen',
            'price_to' => 'precio destino',
            'active' => 'activo',
            'deleted' => 'borrado'

            ];


    }

    public function messages()
    {
        return [
                'pev_product_id.required'  => 'El campo :attribute es obligatorio',
                'pev_product_id.numeric' => 'El campo :attribute debe ser numerico',
                'price_from.required'  => 'El campo :attribute es obligatorio',
                'price_from.numeric' => 'El campo :attribute debe ser numerico',
                'price_from.required'  => 'El campo :attribute es obligatorio',
                'price_from.numeric' => 'El campo :attribute debe ser numerico',
                'active.boolean' => 'El campo :attribute debe ser booleano',
                'deleted.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
