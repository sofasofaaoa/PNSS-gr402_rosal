<?php

namespace Controller;

use Src\View;
use Src\Request;
use Src\Auth\Auth;


class Diagnosis
{

    public static function diagnosis(): string
    {
        $diagnosis = \Model\Diagnosis::all();
        return (new View())->render('site.diagnosis', ['diagnosis' => $diagnosis]);
    }
}
