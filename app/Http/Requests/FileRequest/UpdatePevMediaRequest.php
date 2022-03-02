<?php

namespace App\Http\Requests\FileRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePevMediaRequest extends FormRequest
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
            "pev_image_zone_id"=> ['numeric'],
            "url"=> ['max:128'],
            "url_amigable" => ['max:80'],
            "alt"=> ['max:80'],
            "title"=> ['max:180'],
            "description"=> ["max:180"],
            "deleted"=> ['boolean'],
        ];
    }

    public function attributes(){
            return [
            "pev_image_zone_id" => 'id del admin',
            "url"=> 'url',
            "url_amigable"=> 'url amigable',
            "alt" => "texto alternativo",
            "title"=> 'titulo',
            "description"=> 'descripción',
            "deleted"=> 'borrado',
            ];
    }

    public function messages()
    {
        return [
                'pev_image_zone_id.numeric' => 'El campo :attribute debe ser numerico',
                'url.max:128' => 'El campo :attribute excede el máximo de caracteres',
                'url_amigable.max:80' => 'El campo :attribute excede el máximo de caracteres',
                'alt.max:80' => 'El campo :attribute excede el máximo de caracteres',
                'title.max:180' => 'El campo :attribute excede el máximo de caracteres',
                'description.max:180' => 'El campo :attribute excede el máximo de caracteres',
                'deleted.numeric' => 'El campo :attribute debe ser booleano',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
