<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PevAddressRequestUpdate extends FormRequest
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
            'pev_customer_id' => [ 'numeric'],
            'pev_country_id' => [ 'numeric'],
            'pev_state_id' => [ 'numeric'],
            'default'=> ['boolean'],
            'alias'=> ['max:32'],
            'company'=> ['max:255'],
            'lastname'=> ['max:255'],
            'firstname'=> ['max:255'],
            'address1'=> ['max:128'],
            'address2'=> ['max:128'],
            'postcode'=> ['max:12'],
            'city'=> ['max:64'],
            'other'=> [],
            'phone'=> ['max:32'],
            'phone_mobile'=> ['max:32'],
            'vat_number'=> ['max:32'],
            'dni'=> ['max:16'],
            'active'=> ['boolean'],
        ];
    }

   public function messages()
    {
        return [

            'pev_customer_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_country_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_state_id.numeric' => 'El campo :attribute debe ser numerico',
            'default.boolean' => 'El campo :attribute debe ser booleano',
            'alias.max:32' => 'El campo :attribute excede el número de caracteres',
            'company.max:255' => 'El campo :attribute excede el número de caracteres',
            'lastname.max:255' => 'El campo :attribute excede el número de caracteres',
            'firstname.max:255' => 'El campo :attribute excede el número de caracteres',
            'address1.max:128' => 'El campo :attribute excede el número de caracteres',
            'address2.max:128' => 'El campo :attribute excede el número de caracteres',
            'postcode.max:12' => 'El campo :attribute excede el número de caracteres',
            'city.max:64' => 'El campo :attribute excede el número de caracteres',
            'phone.max:32' => 'El campo :attribute excede el número de caracteres',
            'phone_mobile.max:32' => 'El campo :attribute excede el número de caracteres',
            'vat_number.max:32' => 'El campo :attribute excede el número de caracteres',
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
