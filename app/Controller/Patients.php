<?php

namespace Controller;

use Model\Cabinet;
use Model\Patient;
use Model\Reception;
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

    public static function patient(Request $request): string
    {
        $receptions = Reception::where('patient_id', $request->patient_id)->get();
//        $users = User::where('id', $request->id)->get();
//        $cabinets = Cabinet::where('cabinet_id', $request->cabinet_id)->get();
        $patients = Patient::where('patient_id', $request->patient_id)->get();
        return (new View())->render('site.patient', [
            'patients' => $patients,
//            'users' => $users,
//            'cabinets' => $cabinets,
            'receptions' => $receptions,
            ]);
    }
}
