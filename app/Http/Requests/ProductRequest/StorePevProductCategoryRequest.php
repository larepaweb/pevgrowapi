<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevProductCategoryRequest extends FormRequest
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
            'pev_product_category_id' => ['required', 'numeric'],
            'pev_tax_rule_group_id' => ['numeric', 'nullable'],
            'ean13' => ['max:13', 'nullable'],
            'isbn' => ['max:32', 'nullable'],
            'upc'  => ['max:12', 'nullable'],
            'price' => ['numeric', 'nullable'],
            'reference' => ['max:64', 'nullable'],
            'width'  => ['numeric', 'nullable'],
            'height' => ['numeric', 'nullable'],
            'depth' => ['numeric', 'nullable'],
            'weight'  => ['numeric', 'nullable'],
            'active'  => ['boolean'],
            'available_for_order' => ['boolean'],
            'show_price'  => ['boolean'],
            'description_num_columns'  => ['numeric', 'nullable'],
            'deleted' => ['boolean'],
        ];
    }

    public function attributes(){
            return [
                'pev_product_category_id' => 'id de categoria de producto',
                'pev_tax_rule_group_id' => 'id de regla grupal de impuesto',
                'ean13' => 'código ean13',
                'isbn' => 'código isbn',
                'upc'  => 'código upc',
                'price' => 'precio',
                'reference' => 'referencia',
                'width'  => 'ancho',
                'height' => 'altura',
                'depth' => 'profundidad',
                'weight'  => 'peso',
                'active'  => 'activo',
                'available_for_order' => 'disponible para ordenar',
                'show_price'  => 'mostrar precio',
                'description_num_columns'  => 'descripción de numero de columnas',
                'deleted' => 'borrado',
            ];
    }

    public function messages()
    {
        return [

                'pev_product_category_id.required' => 'El campo :attribute es obligatorio',
                'pev_product_category_id.numeric' => 'El campo :attribute debe ser númerico',
                'pev_tax_rule_group_id.numeric' => 'El campo :attribute debe ser númerico',
                'ean13.max:13' => 'El campo :attribute excede el máximo de caracteres',
                'isbn.max:32' => 'El campo :attribute excede el máximo de caracteres',
                'upc.max:12' => 'El campo :attribute excede el máximo de caracteres',
                'price.numeric' => 'El campo :attribute debe ser númerico',
                'reference.max:64' => 'El campo :attribute excede el máximo de caracteres',
                'width.numeric' => 'El campo :attribute debe ser númerico',
                'height.numeric' => 'El campo :attribute debe ser númerico',
                'depth.numeric' => 'El campo :attribute debe ser númerico',
                'weight.numeric' => 'El campo :attribute debe ser númerico',
                'active.boolean' => 'El campo :attribute debe ser booleano',
                'available_for_order.boolean' => 'El campo :attribute debe ser booleano',
                'show_price.boolean' => 'El campo :attribute debe ser booleano',
                'description_num_columns.numeric' => 'El campo :attribute debe ser númerico',
                'deleted.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
