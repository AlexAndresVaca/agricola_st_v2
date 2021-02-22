<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validacionCI implements Rule
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
        // Validar longitud y sacar verificador
        if (strlen($value) === 10 ) {
            $verificador = substr($value,-1);
            $longitud = true;
        } elseif(strlen($value) === 13) {
            $verificador = substr($value,-4,1);
            $longitud = true;
        }else{
            $verificador = null;
            $longitud = false;
        }
        // Validar que solo sean numeros
        if (ctype_digit($value)) {
            $num = true;
        } else {
            $num = false;
        }

        // Validar que sea una cedula
        $coe = [2, 1, 2, 1, 2, 1, 2, 1, 2];
        $total = 0;
        for ($i = 0; $i < 9; $i++) {
            # code...
            $rest = $coe[$i] * $value[$i];
            if ($rest >= 10) {
                $rest = $rest - 9;
            }
            $total = $total + $rest;
        }
        //
        if (is_integer($total / 10)) {
            $superior = $total;
        } else {
            $float = $total / 10;
            $superior = ceil($float);
            $superior = $superior * 10;
        }
        $resultado = $superior - $total;

        if ($verificador == $resultado) {
            $ci = true;
        } else {
            $ci = false;
        }
        return $longitud && $num && $ci;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No es una cédula';
    }
}
