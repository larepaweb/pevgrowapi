<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PevAddressRequestStore extends FormRequest
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
            'pev_customer_id' => ['required', 'numeric'],
            'pev_country_id' => ['required', 'numeric'],
            'pev_state_id' => ['required', 'numeric'],
            'default'=> ['boolean'],
            'alias'=> ['required' ,'max:32'],
            'company'=> ['required' ,'max:255'],
            'lastname'=> ['required' ,'max:255'],
            'firstname'=> ['required' ,'max:255'],
            'address1'=> ['required' ,'max:128'],
            'address2'=> ['required' ,'max:128'],
            'postcode'=> ['required' ,'max:12'],
            'city'=> ['required' ,'max:64'],
            'other'=> ['required'],
            'phone'=> ['required' ,'max:32'],
            'phone_mobile'=> ['required' ,'max:32'],
            'vat_number'=> ['required' ,'max:32'],
            'dni'=> ['required' ,'max:16'],
            'active'=> ['boolean'],
        ];
    }

   public function messages()
    {
        return [

            'pev_customer_id.required' => 'El campo :attribute es obligatorio',
            'pev_customer_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_country_id.required' => 'El campo :attribute es obligatorio',
            'pev_country_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_state_id.required' => 'El campo :attribute es obligatorio',
            'pev_state_id.numeric' => 'El campo :attribute debe ser numerico',
            'default.boolean' => 'El campo :attribute debe ser booleano',
            'alias.required' => 'El campo :attribute es obligatorio',
            'alias.max:32' => 'El campo :attribute excede el número de caracteres',
            'company.required' => 'El campo :attribute es obligatorio',
            'company.max:255' => 'El campo :attribute excede el número de caracteres',
            'lastname.required' => 'El campo :attribute es obligatorio',
            'lastname.max:255' => 'El campo :attribute excede el número de caracteres',
            'firstname.required' => 'El campo :attribute es obligatorio',
            'firstname.max:255' => 'El campo :attribute excede el número de caracteres',
            'address1.required' => 'El campo :attribute es obligatorio',
            'address1.max:128' => 'El campo :attribute excede el número de caracteres',
            'address2.required' => 'El campo :attribute es obligatorio',
            'address2.max:128' => 'El campo :attribute excede el número de caracteres',
            'postcode.required' => 'El campo :attribute es obligatorio',
            'postcode.max:12' => 'El campo :attribute excede el número de caracteres',
            'city.required' => 'El campo :attribute es obligatorio',
            'city.max:64' => 'El campo :attribute excede el número de caracteres',
            'other.required' => 'El campo :attribute es obligatorio',
            'phone.required' => 'El campo :attribute es obligatorio',
            'phone.max:32' => 'El campo :attribute excede el número de caracteres',
            'phone_mobile.required' => 'El campo :attribute es obligatorio',
            'phone_mobile.max:32' => 'El campo :attribute excede el número de caracteres',
            'vat_number.required' => 'El campo :attribute es obligatorio',
            'vat_number.max:32' => 'El campo :attribute excede el número de caracteres',
            'dni.required' => 'El campo :attribute es obligatorio',
            'dni.max:16' => 'El campo :attribute excede el número de caracteres',
            'active.boolean' => 'El campo :attribute debe ser booleano',
        ];

    }

    public function attributes(){
            return [

            'pev_customer_id' => 'id cliente',
            'pev_country_id' => 'id pais',
            'pev_state_id' => 'id estado',
            'default'=> 'default',
            'alias'=> 'alias',
            'company'=> 'compañia',
            'lastname'=> 'apellido',
            'firstname'=> 'nombre',
            'address1'=> 'dirección 1',
            'address2'=> 'dirección 2',
            'postcode'=> 'código postal',
            'city'=> 'ciudad',
            'other'=> 'otro',
            'phone'=> 'teléfono',
            'phone_mobile'=> 'número teléfonico móvil',
            'vat_number'=> 'número vat',
            'dni'=> 'dni',
            'active'=> 'activo',
            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
