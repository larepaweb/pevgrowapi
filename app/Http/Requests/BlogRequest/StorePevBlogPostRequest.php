<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePevBlogPostRequest extends FormRequest
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
            'pev_admin_id' => ['required', 'numeric'],
            'active' => ['boolean'],

        ];
    }

    public function attributes(){
            return [
            'pev_admin_id' => 'id del admin',
            'active' => 'activo',
            ];
    }

    public function messages()
    {
        return [
                'pev_admin_id.required' => 'El campo :attribute es obligatorio',
                'pev_admin_id.numeric' => 'El campo :attribute debe ser numerico',
                'active.boolean'  => 'El campo :attribute debe ser booleano',

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
