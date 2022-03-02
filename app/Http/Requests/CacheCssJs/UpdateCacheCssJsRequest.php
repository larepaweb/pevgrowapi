<?php

namespace App\Http\Requests\CacheCssJs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdateCacheCssJsRequest extends FormRequest
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

            'type'  => ['boolean'],
            'compiled'  => ['max:255'],

        ];
    }

    public function attributes(){
            return [

            'type'  => 'tipo',
            'compiled'  => 'compilados',

            ];


    }

    public function messages()
    {
        return [

            'type.boolean' => 'El campo :attribute debe ser booleano',
            'compiled.max:255' => 'El campo :attribute excede el máximo de caracteres',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
