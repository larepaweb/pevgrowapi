<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevFaqLangRequest extends FormRequest
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
            'pev_faq_id' => ['numeric'],
            'pev_lang_id' => ['numeric'],
            'question' => ['max:256'],
            'answer' => ['max:256'],
            'active_lang' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [

            'pev_faq_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'active_lang.boolean' => 'El campo :attribute debe ser boolean',
            'question.max:256' => 'El campo :attribute excesido el numero de caracteres',
            'answer.max:256' => 'El campo :attribute excesido el numero de caracteres',
        ];

    }

    public function attributes(){
            return [

            'pev_faq_id' => 'id de faq',
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
