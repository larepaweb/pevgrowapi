<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevProductAttributeGroupRequest extends FormRequest
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

            'is_color_group' => ['boolean'],
            'group_type' => ['max:255'],
            'position' => ['numeric'],
            'deleted' => ['boolean'],

        ];
    }


    // public function messages()
    // {
    //     return [

    //         'is_color_group.boolean' => 'El campo :attribute debe ser booleano',
    //         'group_type.max:255' => 'El campo :attribute excede el máximo de caracteres',
    //         'position.numeric' => 'El campo :attribute debe ser númerico',
    //         'deleted.boolean' => 'El campo :attribute debe ser booleano',

    //     ];

    // }

    public function attributes(){
            return [

            'is_color_group' => 'es de grupo de color',
            'group_type' => 'tipo de grupo',
            'position' => 'posición',
            'deleted' => 'borrado',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
