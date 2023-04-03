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

    public static function reception(Request $request): string
    {

        $diagnosis = Diagnosis::all();
        $reception = \Model\Reception::where('reception_id', $request->reception_id)->first();
        $patients = Patient::where('patient_id', $reception->patient_id)->first();
        $users = User::where('id', $reception->id)->first();
        $d = Diagnosis::where('diagnosis_id', $reception->diagnosis_id)->first();
        if ($request->method === 'POST' && $reception->where('reception_id', $request->reception_id)->update(['diagnosis_id' => $request->diagnosis_id])) {

            return new View('site.reception', ['message' => 'Запись на приём изменена',
                'reception' => $reception,
                'patients' => $patients,
                'diagnosis' => $diagnosis,
                'd' => $d,
                'users' => $users,]);

        }
        return (new View())->render('site.reception', [
            'reception' => $reception,
            'patients' => $patients,
            'diagnosis' => $diagnosis,
            'users' => $users,
            'd' => $d,
        ]);
    }
}
