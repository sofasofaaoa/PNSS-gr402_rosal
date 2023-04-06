<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class DateofrecValidator extends AbstractValidator
{

    protected string $message = 'Enter a valid date';

    public function rule(): bool
    {
        return $this->value >= date('Y-m-d');
    }
}