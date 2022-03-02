<?php

namespace App\Http\Requests\CMSRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevCMSLangRequest extends FormRequest
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
            'pev_cms_id'  => 'numeric',
            'pev_lang_id'  => 'numeric',
            'title'  => 'nullable|max:255',
            'url' => 'max:128',
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
            'url' => 'url',
            'noindex'  => 'noindex',
            'active_lang'  => 'idioma activo',
            'ignore_lang'  => 'idioma ignorado',
            ];

    }

    public function messages()
    {
        return [
            'pev_cms_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'title.max:255'  => 'El campo :attribute excede la cantidad de caracteres',
            'url.max:128'  => 'El campo :attribute excede la cantidad de caracteres',
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
