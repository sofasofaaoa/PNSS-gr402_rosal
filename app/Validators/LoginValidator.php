<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LoginValidator extends AbstractValidator
{

    protected string $message = 'Minimum 3 characters, English alphabet and numbers only';

    public function rule(): bool
    {
        return preg_match('[0-9a-zA-Z]{3,}' , $this->value);
    }
}
