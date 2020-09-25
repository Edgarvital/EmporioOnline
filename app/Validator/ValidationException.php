<?php

namespace App\Validator;

class ValidationException extends \Exception
{
    protected $validator;

    public function __construct($validator, $text = "Erro na Validação dos Dados")
    {
        parent::__construct($text);
        $this->validator = $validator;
    }

    public function getValidator()
    {
        return $this->validator;
    }
}
