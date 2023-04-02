<?php

namespace Controller;

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
        if ($request->method === 'POST' && User::create($request->all())) {
            return new View('site.newpatient', ['message' => 'Пользователь успешно зарегистрирован']);
        }
        return new View('site.newpatient');
    }
}
