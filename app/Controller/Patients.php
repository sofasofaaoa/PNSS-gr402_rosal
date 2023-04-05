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

    public static function patients(Request $request): string
    {
        $patients = \Model\Patient::all();
        if ($request->method === 'POST') {
            $patients = Patient::where('surname', $request->find)->get();
            return (new View())->render('site.patients', ['patients' => $patients]);
        }
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
//        $users = User::where('id', $receptions->id)->get();
//        $cabinets = Cabinet::where('cabinet_id', $request->cabinet_id)->get();
        $diagnoses = [];
        foreach ($receptions as $key => $reception){
            $diagnoses[$key] = \Model\Diagnosis::where('diagnosis_id', $reception->diagnosis_id)->get();
        }
        $doc = [];
        foreach ($receptions as $reception){
            $doc[] = \Model\User::where('id', $reception->id)->first();
        }
        $patients = Patient::where('patient_id', $request->patient_id)->get();
        return (new View())->render('site.patient', [
            'patients' => $patients,
            'doc' => $doc,
//            'cabinets' => $cabinets,
            'receptions' => $receptions,
            'diagnoses' => $diagnoses
        ]);
    }
}
