<?php

namespace App\Http\Requests\FaqRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevFaqCategoryLangRequest extends FormRequest
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
            'pev_faqcategory_id' => ['numeric'],
            'name' => ['max:255'],
            'text' => [],
            'active_lang' => ['boolean'],
        ];
    }


   public function messages()
    {
        return [
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_faqcategory_id.numeric' => 'El campo :attribute debe ser numerico',
            'name.max:255' => 'El campo :attribute excede el número de caracteres',
            'active_lang.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    public function attributes(){
            return [

            'pev_lang_id' => 'id de idioma',
            'pev_faqcategory_id' => 'ide de categoria de faq',
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
