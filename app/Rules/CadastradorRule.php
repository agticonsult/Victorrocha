<?php

namespace App\Rules;

use App\Models\Cadastrador;
use Illuminate\Contracts\Validation\Rule;

class CadastradorRule implements Rule
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
        $cadastrador = Cadastrador::where('id', '=', $value)->where('ativo', '=', Cadastrador::ATIVO)->first();
        if (!$cadastrador){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cadastrador inválido.';
    }
}
