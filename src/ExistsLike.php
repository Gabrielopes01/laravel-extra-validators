<?php

namespace Gabrielopes01\LaravelExtraValidators;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Validator;

class ExistsLike implements Rule
{
    public static function handle(): string
    {
        return 'exists_like';
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
        
        if(!$params || count($params) < 2) {
            throw new Exception('A regra "exists_like" espera pelo menos 2 parâmetros');
        }

        if (!class_exists($params[0])) {
            throw new Exception("Classe {$params[0]} não encontrada");
        }

        $class = new $params[0]();
        $table = $class->getTable();

        if (!Schema::hasColumn($table, $params[1])){
            throw new Exception("A coluna {$params[1]} não existe na tabela {$table}");
        }
        
        $value = DB::table($table)
                    ->where($params[1], 'LIKE', "%$value%")
                    ->exists();

        $validator->setCustomMessages([
            $handle => $this->message(),
        ]);

        return $this->passes($attribute, $value);
    }
}
