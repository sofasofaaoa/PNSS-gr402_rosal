<?php

namespace Controller;

use Model\Cabinet;
use Model\Patient;
use Model\Reception;
use Src\Validator\Validator;
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
            $validator = new Validator($request->all(), [
                'name' => ['required', 'russian'],
                'surname' => ['required', 'russian'],
                'patronymic' => ['russian'],
                'date_of_birth' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'russian' => 'Только русский алфавит в поле :field',
            ]);

            if($validator->fails()){
                return new View('site.newpatient',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }else{
                $patient = Patient::create($request->all());
                $patient->save();
                return new View('site.newpatient', ['message' => 'Пациент зарегистрирован']);
            }
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
