<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevFaqCategoryLangRequest extends FormRequest
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
            // 'options' => ['required', 'numeric'],
            'pev_lang_id' => ['required', 'numeric'],
            // 'pev_faqcategory_id' => ['required', 'numeric'],
            'name' => ['required', 'array'],
            'text' => ['required', 'array'],
            'active_lang' => ['boolean'],
        ];
    }

   public function messages()
    {
        return [

            'pev_lang_id.required' => 'El campo :attribute es obligatorio',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'name.required' => 'El campo :attribute es obligatorio',
            'name.numeric' => 'El campo :attribute debe ser numerico',
            'text.required' => 'El campo :attribute es obligatorio',
            'active_lang.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    public function attributes(){
            return [

            'pev_lang_id' => 'id de idioma',
            'name' => 'nombre',
            'text' => 'texto',
            'active_lang' => 'idioma activo',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
