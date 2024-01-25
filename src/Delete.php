<?php

namespace Gabrielopes01\LaravelExtraValidators;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Validator;

class Delete implements Rule
{
    protected $method;
    protected $data;

    public function __construct()
    {
        $this->method  = request()->capture()->method();
        $this->data    = request()->all();
    }

    public static function handle(): string
    {
        return 'delete';
    }

    public function passes($attribute, $value)
    {
        return true;
    }

    public function message()
    {
        return __('O campo não é aceito neste tipo de Requisição');
    }

    public function validate(string $attribute, $value, $params, Validator $validator)
    {
        $handle = $this->handle();
        $rules  = $validator->getRules();

        if ($this->method !== 'DELETE') {
            unset($rules[$attribute]);
        }

        $validator->setCustomMessages([
            $handle => $this->message(),
        ]);

        $validator->setRules($rules);

        return $this->passes($attribute, $value);
    }
}
