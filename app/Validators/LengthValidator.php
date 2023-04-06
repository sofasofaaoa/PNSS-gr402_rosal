<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LengthValidator extends AbstractValidator
{

    protected string $message = 'English alphabet and numbers only';

    public function rule(): bool
    {
        return 6 <= strlen($this->value);
    }
}
