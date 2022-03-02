<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevFaqLangRequest extends FormRequest
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
            //'pev_faq_id' => ['required', 'numeric'],
            'pev_faq_category_id' => ['required', 'numeric'],
            'pev_lang_id' => ['required', 'numeric'],
            'question' => ['required', 'array'],
            'answer' => ['required', 'array'],
            'active_lang' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [

            'pev_faq_category_id.required' => 'El campo :attribute es obligatorio',
            'pev_faq_category_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_lang_id.required' => 'El campo :attribute es obligatorio',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'question.required' => 'El campo :attribute es obligatorio',
            'answer.required' => 'El campo :attribute es obligatorio',
            'active_lang.boolean' => 'El campo :attribute debe ser boolean',



        ];

    }

    public function attributes(){
            return [

            'pev_faq_category_id' => 'id de categorias faq',
            'pev_lang_id' => 'id de idiomas',
            'question' => 'pregunta',
            'answer' => 'respuesta',
            'active_lang'  => 'idioma activo',

            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }


}
