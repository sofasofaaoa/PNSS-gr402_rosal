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
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required', 'russian'],
                'surname' => ['required', 'russian'],
                'patronymic' => ['russian'],
                'date_of_birth' => ['required', 'dateofbirth'],
            ], [
                'dateofbirth' => 'Дата должна быть меньше или равна сегодняшней',
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
        $patient = Patient::where('patient_id', $request->patient_id)->first();
        return (new View())->render('site.patient', [
            'patient' => $patient,
        ]);
    }
}
