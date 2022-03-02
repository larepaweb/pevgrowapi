<?php

namespace App\Rules\ReglasGenerales;

use Illuminate\Contracts\Validation\Rule;

class RegistrosEliminados implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value == 1){
            dd("aqui");
        }
            
    
       // $uppercase = preg_match('@[A-Z]@', $value);
        // $lowercase = preg_match('@[a-z]@', $value);
        // $number = preg_match('@[0-9]@', $value);
        // $specialChars = preg_match('@[^\w]@', $value);

   // return $uppercase && $lowercase && $number && $specialChars;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
