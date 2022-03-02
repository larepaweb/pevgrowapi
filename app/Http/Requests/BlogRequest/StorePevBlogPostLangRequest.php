<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevBlogPostLangRequest extends FormRequest
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
            "pev_admin_id"=> ['required', 'numeric'],
            "pev_lang_id"=> ['required', 'numeric'],
            "pev_blog_category_id" => ['required', 'numeric'],
            "name"=> ['required', 'array'],
            "text"=> ['required', 'array'],
            "richsnippet"=> ['string', "nullable"],
            "image"=> ['required', 'max:128'],
            "url"=> ['required', 'max:128'],
            "meta_title"=> ['required', 'array'],
            "meta_description"=> ['required', 'array'],
            "noindex"=> ['boolean'],
            "active_lang"=> ['boolean'],
            "date_publish"=> ['date'],
        ];
    }

    public function attributes(){
            return [
            "pev_admin_id" => 'id del admin',
            "pev_lang_id"=> 'id del idioma',
            "pev_blog_category_id" => 'id de categoria del blog',
            "name"=> 'nombre',
            "text"=> 'texto',
            "richsnippet"=> 'texto enriquecido',
            "image"=> 'imagen',
            "url"=> 'url',
            "meta_title"=> 'titulo',
            "meta_description"=> 'descripción',
            "noindex"=> 'noindex',
            "active_lang"=> 'idioma activo',
            "date_publish"=> 'fecha de publicación',
            ];
    }

    public function messages()
    {
        return [
                'pev_admin_id.required' => 'El campo :attribute es obligatorio',
                'pev_admin_id.numeric' => 'El campo :attribute debe ser numerico',
                'pev_lang_id.required' => 'El campo :attribute es obligatorio',
                'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
                'pev_blog_category_id.required' => 'El campo :attribute es obligatorio',
                'pev_blog_category_id.numeric' => 'El campo :attribute debe ser numerico',
                'name.required' => 'El campo :attribute es obligatorio',
                'name.array' => 'El campo :attribute debe ser un arreglo',
                'text.required' => 'El campo :attribute es obligatorio',
                'text.array' => 'El campo :attribute debe ser un arreglo',
                'richsnippet.string' => 'El campo :attribute debe ser una cadena de texto',
                'image.required' => 'El campo :attribute es obligatorio',
                'image.max:128' => 'El campo :attribute excede el máximo de caracteres',
                'url.required' => 'El campo :attribute es obligatorio',
                'url.max:128' => 'El campo :attribute excede el máximo de caracteres',
                'meta_title.required' => 'El campo :attribute es obligatorio',
                'meta_title.array' => 'El campo :attribute debe ser un arreglo',
                'meta_description.required' => 'El campo :attribute es obligatorio',
                'meta_description.array' => 'El campo :attribute debe ser un arreglo',
                'noindex.boolean' => 'El campo :attribute debe ser booleano',
                'active_lang.numeric' => 'El campo :attribute debe ser booleano',
                'date_publish.numeric' => 'El campo :attribute debe ser una fecha',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
