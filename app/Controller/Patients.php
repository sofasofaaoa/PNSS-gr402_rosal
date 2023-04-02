<?php

namespace Controller;

use Model\Patient;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;


class Patients
{

    public static function patients(): string
    {
        $patients = \Model\Patient::all();
        return (new View())->render('site.patients', ['patients' => $patients]);
    }

    public function newpatient(Request $request): string
    {
        if ($request->method === 'POST' && Patient::create($request->all())) {
            return new View('site.newpatient', ['message' => 'Пациент успешно зарегистрирован']);
        }
        return new View('site.newpatient');
    }
}
