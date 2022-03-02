<?php

namespace App\Http\Requests\AliasRequest;

use Illuminate\Foundation\Http\FormRequest;

class PevAliasRequestUpdate extends FormRequest
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
            'alias' => ['max:255'],
            'search' => ['max:255'],
            'active' => ['boolean'],
        ];
    }
}
