<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PevCustomerGroupLangRequestStore extends FormRequest
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
            'pev_lang_id' => ['required', 'numeric', 'nullable'],
            'active' => ['boolean'],
            'active_lang' => ['boolean'],
            'name' => ['required', 'array'],
        ];
    }

   public function messages()
    {
        return [
            'pev_lang_id.required' => 'El campo :attribute es requerido',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'active.boolean' => 'El campo :attribute debe ser booleano',
            'active_lang.boolean' => 'El campo :attribute debe ser booleano',
            'name.required' => 'El campo :attribute es requerido',


        ];

    }

    public function attributes(){
            return [

                'active'=> 'activo',
            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }


}
