<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\Patient;
use Model\User;
use Model\Cabinet;
use Model\Diagnosis;
use Src\Auth\Auth;


class Reception
{

    public static function receptions(): string
    {
        $receptions = \Model\Reception::all();
        return (new View())->render('site.receptions', ['receptions' => $receptions]);
    }

    public function new(Request $request): string
    {
        $users = User::all();
        $patients = Patient::all();
        $cabinets = Cabinet::all();
        $diagnosis = Diagnosis::all();
        if ($request->method === 'POST' && \Model\Reception::create($request->all())) {
            return new View('site.newreception', ['message' => 'Запись на приём добавлена']);
        }
        return new View('site.newreception',
            ['users' => $users,
                'patients' => $patients,
                'cabinets' => $cabinets,
                'diagnosis' => $diagnosis]);
    }
}
