<?php

namespace App\Http\Requests\CMSRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevCMSLangRequest extends FormRequest
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
            'pev_cms_id'  => 'required|numeric',
            'pev_lang_id'  => 'required|numeric',
            'title'  => 'nullable|max:255',
            'text'  => 'required',
            'url' => 'required|max:128',
            'meta_title'  => 'required',
            'meta_description' => 'required',
            'noindex'  => 'boolean',
            'active_lang'  => 'boolean',
            'ignore_lang'  => 'boolean',
        ];
    }

    public function attributes(){
            return [
            'pev_cms_id'  => 'id del cms',
            'pev_lang_id'  => 'id del idioma',
            'title'  => 'titulo',
            'text'  => 'texto',
            'url' => 'url',
            'meta_title'  => 'meta titulo',
            'meta_description' => 'meta descripción',
            'noindex'  => 'noindex',
            'active_lang'  => 'idioma activo',
            'ignore_lang'  => 'idioma ignorado',
            ];

    }

    public function messages()
    {
        return [
            'pev_cms_id.required'  => 'El campo :attribute es obligatorio',
            'pev_cms_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_lang_id.required'  => 'El campo :attribute es obligatorio',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'title.max:255'  => 'El campo :attribute excede la cantidad de caracteres',
            'text.required'  => 'El campo :attribute es obligatorio',
            'url.required'  => 'El campo :attribute es obligatorio',
            'url.max:128'  => 'El campo :attribute excede la cantidad de caracteres',
            'meta_title.required'  => 'El campo :attribute es obligatorio',
            'meta_description.required'  => 'El campo :attribute es obligatorio',
            'noindex.boolean' => 'El campo :attribute debe ser booleano',
            'active_lang.boolean' => 'El campo :attribute debe ser booleano',
            'ignore_lang.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
