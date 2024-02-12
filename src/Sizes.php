<?php

namespace Gabrielopes01\LaravelExtraValidators;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Validator;

class Sizes implements Rule
{
    public static function handle(): string
    {
        return 'sizes';
    }

    public function passes($attribute, $value)
    {
        return $value;
    }

    public function message()
    {
        return __('O valor não é válido');
    }

    public function validate(string $attribute, $value, $params, Validator $validator)
    {
        $handle = $this->handle();
        
        if(!$params || count($params) < 1) {
            throw new Exception('A regra "sizes" espera pelo menos 1 parâmetro');
        }

        $value = in_array(strlen($value), $params);

        $validator->setCustomMessages([
            $handle => "{$this->message()}. O campo deve conter " .implode('/', $params) . " caracteres.", 
        ]);

        return $this->passes($attribute, $value);
    }
}
