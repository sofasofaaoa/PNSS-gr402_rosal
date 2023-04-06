<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LoginValidator extends AbstractValidator
{

    protected string $message = 'English alphabet and numbers only';

    public function rule(): bool
    {
        return preg_match("/^[a-z0-9]*$/i", $this->value);
    }
}
