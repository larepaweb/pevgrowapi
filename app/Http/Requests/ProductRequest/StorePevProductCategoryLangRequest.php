<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevProductCategoryLangRequest extends FormRequest
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

            'pev_product_id' => ['required', 'numeric'],
            'pev_lang_id' => ['required', 'numeric'],
            'name' => ['required', 'max:255'],
            'text_intro' => ['nullable'],
            'text_short' => ['nullable'],
            'text' => ['nullable'],
            'video' => ['nullable'],
            'url' => ['required', 'max:255'],
            'meta_title' => ['required', 'max:255'],
            'meta_description' => ['nullable'],
            'active_lang' => ['required', 'boolean'],

        ];
    }


    public function messages()
    {
        return [

            'pev_product_id.required' => 'El campo :attribute es obligatorio',
            'pev_product_id.numeric' => 'El campo :attribute debe ser númerico',
            'pev_lang_id.required' => 'El campo :attribute es obligatorio',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser númerico',
            'name.required' => 'El campo :attribute es obligatorio',
            'name.max:255' => 'El campo :attribute excede el máximo de caracteres',
            'url.required' => 'El campo :attribute es obligatorio',
            'url.max:255' => 'El campo :attribute excede el máximo de caracteres',
            'meta_title.required' => 'El campo :attribute es obligatorio',
            'meta_title.max:255' => 'El campo :attribute excede el máximo de caracteres',
            'active_lang.required' => 'El campo :attribute es obligatorio',
            'active_lang.boolean' => 'El campo :attribute debe ser númerico',
        ];

    }

    public function attributes(){
            return [

                    'pev_product_id' => 'id de producto',
                    'pev_lang_id' => 'id de idioma',
                    'name' => 'nombre',
                    'text_intro' => 'texto introductorio',
                    'text_short' => 'texto corto',
                    'text' => 'texto',
                    'video' => 'video',
                    'url' => 'url',
                    'meta_title' => 'titulo',
                    'meta_description' => 'descripción',
                    'active_lang' => 'idioma activo',
            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
