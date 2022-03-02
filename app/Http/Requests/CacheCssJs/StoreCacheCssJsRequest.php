<?php

namespace App\Http\Requests\CacheCssJs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCacheCssJsRequest extends FormRequest
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

            'type'  => ['required', 'boolean'],
            'page'  => ['required'],
            'text'  => ['required'],
            'compiled'  => ['required', 'max:255'],
            'last_upd'  => ['required'],

        ];
    }

    public function attributes(){
            return [

            'type'  => 'tipo',
            'page'  => 'página',
            'text'  => 'texto',
            'compiled'  => 'compilados',
            'last_upd'  => 'última actualización',

            ];


    }

    public function messages()
    {
        return [

            'type.required' => 'El campo :attribute es obligatorio',
            'type.boolean' => 'El campo :attribute debe ser booleano',
            'page.required' => 'El campo :attribute es obligatorio',
            'text.required' => 'El campo :attribute es obligatorio',
            'compiled.required' => 'El campo :attribute es obligatorio',
            'compiled.max:255' => 'El campo :attribute excede el máximo de caracteres',
            'last_upd.required' => 'El campo :attribute es obligatorio',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
