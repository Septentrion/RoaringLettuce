<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SanitizeText implements Rule
{

    private $blackList = [
            'pomme',
            'poire',
            'abricot',
        ];
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
        $words = explode(' ', $value);

        return empty(array_intersect($words, $this->blackList));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Votre description contient des mots prohibés.';
    }
}
