<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LoginValidator extends AbstractValidator
{

    protected string $message = 'Minimum 3 characters, English alphabet and numbers only';

    public function rule(): bool
    {
        return preg_match("/^[a-z0-9_-]{2,20}$/i", $this->value);
    }
}
