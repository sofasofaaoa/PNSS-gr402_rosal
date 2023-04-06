<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class RussianValidator extends AbstractValidator
{

    protected string $message = 'Field :field must be completed in Russian';

    public function rule(): bool
    {
        return preg_match("/^[а-я -]{2,50}$/iu" , $this->value);
    }
}
