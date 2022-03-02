<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevBlogCategoryLangRequest extends FormRequest
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
            //'options' => ['required', 'numeric'],//opcion creada para poder seleccionar si el registro es en un solo idioma o varios
            'pev_lang_id' => ['required', 'numeric'],
            // 'pev_blog_category_id' => ['required', 'numeric'],
            'name' => ['required', 'max:255'],
            'text' => ['required'],
            'url' => ['required', 'max:128'],
            'meta_title' => ['required', 'max:255'],
            'meta_description' => ['required'],
            'noindex' => ['boolean'],
            'active_lang' => ['boolean'],

        ];
    }

    public function attributes(){
            return [
            'pev_lang_id' => 'identificador de idioma',
            'name' => 'nombre',
            'text' => 'texto',
            'url' => 'url',
            'meta_title' => 'titulo',
            'meta_description' => 'descripción',
            'noindex' => 'noindex',
            'active_lang' => 'idioma activo',

            ];


    }

    public function messages()
    {
        return [
            'pev_lang_id.required' => 'El campo :attribute es obligatorio',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'name.required' => 'El campo :attribute es obligatorio',
            'name.size:255' => 'El campo :attribute excede el máximo de caracteres',
            'text.required' => 'El campo :attribute es obligatorio',
            'url.required' => 'El campo :attribute es obligatorio',
            'url.size:128' => 'El campo :attribute excede el máximo de caracteres',
            'meta_title.required' => 'El campo :attribute es obligatorio',
            'meta_title.size:255' => 'El campo :attribute excede el máximo de caracteres',
            'meta_description.required' => 'El campo :attribute es obligatorio',
            'noindex.boolean' => 'El campo :attribute debe ser booleano',
            'active_lang.boolean' =>  'El campo :attribute debe ser booleano',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
