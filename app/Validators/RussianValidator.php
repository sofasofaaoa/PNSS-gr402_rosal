<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class RussianValidator extends AbstractValidator
{

    protected string $message = 'Field :field must be completed in Russian';

    public function rule(): bool
    {
        return preg_match("/^[а-яё -]{1,50}$/iu" , $this->value);
    }
}
