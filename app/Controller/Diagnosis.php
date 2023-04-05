<?php

namespace Controller;

use Model\Patient;
use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;


class Diagnosis
{

    public static function diagnosis(Request $request): string
    {
        $diagnosis = \Model\Diagnosis::all();
        if ($request->method === 'POST' && \Model\Diagnosis::create($request->all())) {
            return (new View())->render('site.diagnosis', ['diagnosis' => $diagnosis,'message' => 'Диагноз успешно зарегистрирован']);
        }
        return (new View())->render('site.diagnosis', ['diagnosis' => $diagnosis]);

    }
    public function new(Request $request): string
    {

        return new View('site.diagnosis');
    }
}
