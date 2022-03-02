<?php

namespace App\Http\Requests\LangRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevLangRequest extends FormRequest
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
            'name' => ['max:30'],
            'active' => ['boolean'],
            'language_code' => ['max:30', 'alpha_dash'],
            'locale' => ['max:30', 'alpha_dash'],
            'date_format_lite' => ['max:30'],
            'date_format_full' => ['max:30'],
            'iso_code' => ['alpha', 'max:2'],
            'is_rtl' => ['boolean'],
        ];
    }

    public function attributes(){
            return [
            "name" => 'nombre',
            "locale"=> 'código de idioma',
            "date_format_lite" => "formato de fecha corto",
            "date_format_full"=> 'formato de fecha completo',
            "iso_code"=> 'código iso de idioma',
            ];
    }

    public function messages()
    {
        return [
                'name.max:30' => 'El campo :attribute excede el máximo de caracteres',
                'language_code.max:30' => 'El campo :attribute excede el máximo de caracteres',
                'language_code.alpha_dash' => 'El campo :attribute solo puede contener letras, números y guiones',
                'locale.max:30' => 'El campo :attribute excede el máximo de caracteres',
                'locale.alpha_dash' => 'El campo :attribute solo puede contener letras, números y guiones',
                'date_format_lite.max:30' => 'El campo :attribute excede el máximo de caracteres',
                'date_format_full.max:30' => 'El campo :attribute excede el máximo de caracteres',
                'iso_code.max:2' => 'El campo :attribute excede el máximo de caracteres',
                'iso_code.alpha' => 'El campo :attribute solo puede contener letras',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }


}
