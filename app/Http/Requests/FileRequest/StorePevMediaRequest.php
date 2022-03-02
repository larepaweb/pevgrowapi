<?php

namespace App\Http\Requests\FileRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevMediaRequest extends FormRequest
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
            "pev_image_zone_id"=> ['required', 'numeric'],
            "url"=> ['required', 'max:128'],
            "url_amigable" => ['required', 'max:80'],
            "alt"=> ['required', 'max:80'],
            "title"=> ['required', 'max:180'],
            "description"=> ['required', "max:180"],
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
                'pev_image_zone_id.required' => 'El campo :attribute es obligatorio',
                'pev_image_zone_id.numeric' => 'El campo :attribute debe ser numerico',
                'url.required' => 'El campo :attribute es obligatorio',
                'url.max:128' => 'El campo :attribute excede el máximo de caracteres',
                'url_amigable.required' => 'El campo :attribute es obligatorio',
                'url_amigable.max:80' => 'El campo :attribute excede el máximo de caracteres',
                'alt.required' => 'El campo :attribute es obligatorio',
                'alt.max:80' => 'El campo :attribute excede el máximo de caracteres',
                'title.required' => 'El campo :attribute es obligatorio',
                'title.max:180' => 'El campo :attribute excede el máximo de caracteres',
                'description.required' => 'El campo :attribute es obligatorio',
                'description.max:180' => 'El campo :attribute excede el máximo de caracteres',
                'deleted.numeric' => 'El campo :attribute debe ser booleano',
        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
