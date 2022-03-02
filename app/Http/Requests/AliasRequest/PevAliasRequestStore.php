<?php

namespace App\Http\Requests\AliasRequest;

use Illuminate\Foundation\Http\FormRequest;

class PevAliasRequestStore extends FormRequest
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
            'alias' => ['required', 'max:255'],
            'search' => ['required', 'max:255'],
            'active' => ['boolean'],
        ];
    }
}
