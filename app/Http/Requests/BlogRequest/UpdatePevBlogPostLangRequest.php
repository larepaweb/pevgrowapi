<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdatePevBlogPostLangRequest extends FormRequest
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
            "pev_blog_post_id" => ["numeric"],
            "pev_lang_id"=> ['numeric'],
            "pev_blog_category_id" => ['numeric'],
            "name"=> ['max:255'],
            "text"=> ['nullable'],
            "richsnippet"=> ['nullable'],
            "image"=> ['max:128'],
            "url"=> ['max:128'],
            "meta_title"=> ['max:255'],
            "meta_description"=> ['nullable'],
            "noindex"=> ['boolean'],
            "active_lang"=> ['boolean'],
            "date_publish"=> ['date'],
        ];
    }

    public function attributes(){
            return [
            "pev_blog_post_id" => 'id de publicacion del blog',
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
                'pev_blog_post_id' =>  'El campo :attribute debe ser numerico',
                'pev_admin_id.numeric' => 'El campo :attribute debe ser numerico',
                'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
                'pev_blog_category_id.numeric' => 'El campo :attribute debe ser numerico',
                'name.array' => 'El campo :attribute debe ser un arreglo',
                'text.array' => 'El campo :attribute debe ser un arreglo',
                'richsnippet.string' => 'El campo :attribute debe ser una cadena de texto',
                'image.max:128' => 'El campo :attribute excede el máximo de caracteres',
                'url.max:128' => 'El campo :attribute excede el máximo de caracteres',
                'meta_title.array' => 'El campo :attribute debe ser un arreglo',
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
