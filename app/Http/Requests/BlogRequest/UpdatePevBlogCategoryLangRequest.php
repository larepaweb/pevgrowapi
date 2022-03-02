<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevBlogCategoryLangRequest extends FormRequest
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
            'pev_lang_id' => ['numeric'],
            'pev_blog_category_id' => ['numeric'],
            'name' => ['max:255'],
            'text' => ['nullable'],
            'url' => ['max:128'],
            'meta_title' => ['max:255'],
            'meta_description' => ['nullable'],
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
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_blog_category_id.numeric' => 'El campo :attribute debe ser numerico',
            'name.size:255' => 'El campo :attribute excede el máximo de caracteres',
            'url.size:128' => 'El campo :attribute excede el máximo de caracteres',
            'meta_title.size:255' => 'El campo :attribute excede el máximo de caracteres',
            'noindex.boolean' => 'El campo :attribute debe ser booleano',
            'active_lang.boolean' =>  'El campo :attribute debe ser booleano',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
