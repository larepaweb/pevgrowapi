<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PevCustomerRequestStore extends FormRequest
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
            'pev_customer_group_id' => ['required', 'numeric'],
            'pev_lang_id' => ['required', 'numeric'],
            'company'=> ['required' ,'max:255'],
            'siret'=> ['required' ,'max:255'],
            'ape'=> ['required' ,'max:255'],
            'lastname'=> ['required' ,'max:255'],
            'firstname'=> ['required' ,'max:255'],
            'email'=> ['required' ,'max:255'],
            'password'=> ['required' ,'max:255'],
            'birthday'=> ['required'],
            'newsletter'=> ['required' .'boolean'],
            'ip_registration_newsletter'=> ['required' ,'max:15'],
            'secure_key'=> ['required' ,'max:32'],
            'note'=> ['required' ],
            'is_guest'=> ['boolean'],
            'active'=> ['boolean'],
            // 'email_verified_at',
            // 'last_passwd_gen',
            // 'birthday',
            // 'newsletter_date_add',

        ];
    }

   public function messages()
    {
        return [

            'pev_customer_group_id.required' => 'El campo :attribute es obligatorio',
            'pev_customer_group_id.numeric' => 'El campo :attribute debe ser numerico',
            'pev_lang_id.required' => 'El campo :attribute es obligatorio',
            'pev_lang_id.numeric' => 'El campo :attribute debe ser numerico',
            'company.required' => 'El campo :attribute es obligatorio',
            'company.max:255' => 'El campo :attribute excede el número de caracteres',
            'siret.required' => 'El campo :attribute es obligatorio',
            'siret.max:255' => 'El campo :attribute excede el número de caracteres',
            'ape.required' => 'El campo :attribute es obligatorio',
            'ape.max:255' => 'El campo :attribute excede el número de caracteres',
            'lastname.required' => 'El campo :attribute es obligatorio',
            'lastname.max:255' => 'El campo :attribute excede el número de caracteres',
            'firstname.required' => 'El campo :attribute es obligatorio',
            'firstname.max:255' => 'El campo :attribute excede el número de caracteres',
            'email.required' => 'El campo :attribute es obligatorio',
            'email.max:255' => 'El campo :attribute excede el número de caracteres',
            'password.required' => 'El campo :attribute es obligatorio',
            'password.max:255' => 'El campo :attribute excede el número de caracteres',
            'birthday.required' => 'El campo :attribute es obligatorio',
            'newsletter.required' => 'El campo :attribute es obligatorio',
            'newsletter.boolean' => 'El campo :attribute debe ser booleano',
            'ip_registration_newsletter.required' => 'El campo :attribute es obligatorio',
            'ip_registration_newsletter.max:15' => 'El campo :attribute excede el número de caracteres',
            'secure_key.required' => 'El campo :attribute es obligatorio',
            'secure_key.max:32' => 'El campo :attribute excede el número de caracteres',
            'note.required' => 'El campo :attribute es obligatorio',
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
