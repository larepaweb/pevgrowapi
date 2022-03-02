<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PevCustomerRequestUpdate extends FormRequest
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
            'pev_customer_group_id' => [ 'numeric'],
            'pev_lang_id' => ['numeric'],
            'company'=> ['max:255'],
            'siret'=> ['max:255'],
            'ape'=> ['max:255'],
            'lastname'=> ['max:255'],
            'firstname'=> ['max:255'],
            'email'=> ['max:255'],
            'password'=> ['max:255'],
            'newsletter'=> ['boolean'],
            'ip_registration_newsletter'=> ['max:15'],
            'secure_key'=> ['max:32'],
            'is_guest'=> ['boolean'],
            'active'=> ['boolean'],
            // 'birthday',
            // 'email_verified_at',
            // 'last_passwd_gen',
            // 'birthday',
            // 'newsletter_date_add',
            // 'note',


        ];
    }

   public function messages()
    {
        return [

            'pev_customer_group_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'company.max:255' => 'El campo :attribute excede el número de caracteres',
            'siret.max:255' => 'El campo :attribute excede el número de caracteres',
            'ape.max:255' => 'El campo :attribute excede el número de caracteres',
            'lastname.max:255' => 'El campo :attribute excede el número de caracteres',
            'firstname.max:255' => 'El campo :attribute excede el número de caracteres',
            'email.max:255' => 'El campo :attribute excede el número de caracteres',
            'password.max:255' => 'El campo :attribute excede el número de caracteres',
            'newsletter.boolean' => 'El campo :attribute debe ser booleano',
            'ip_registration_newsletter.max:15' => 'El campo :attribute excede el número de caracteres',
            'secure_key.max:32' => 'El campo :attribute excede el número de caracteres',
            'is_guest.boolean' => 'El campo :attribute debe ser booleano',
            'active.boolean' => 'El campo :attribute debe ser booleano',

        ];

    }

    public function attributes(){
            return [
                'pev_customer_group_id' => 'id de grupo de clientes',
                'pev_lang_id' => 'id de idiomas',
                'company'=> 'compañia',
                'siret'=> 'siret',
                'ape'=> 'ape',
                'lastname'=> 'apellido',
                'firstname'=> 'nombre',
                'email'=> 'correo',
                'password'=> 'contraseña',
                'birthday'=> 'fecha de nacimiento',
                'newsletter'=> 'boletin',
                'ip_registration_newsletter'=> 'ip de registro a boletin',
                'secure_key'=> 'clave de seguridad',
                'note'=> 'nota',
                'is_guest'=> 'es invitado',
                'active'=> 'activo',
                // 'email_verified_at',
                // 'last_passwd_gen',
                // 'birthday',
                // 'newsletter_date_add',
            ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
