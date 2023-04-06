<?php

namespace Controller;

use Src\Validator\Validator;
use Src\View;
use Src\Request;
use Model\Patient;
use Model\User;
use Model\Cabinet;
use Model\Diagnosis;
use Src\Auth\Auth;


class Reception
{

    public static function receptions(Request $request): string
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
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'patient_id' => ['required'],
                'id' => ['required'],
                'date' => ['required', 'dateofrec'],
                'time' => ['required'],
            ], [
                'dateofrec' => 'Дата должна быть больше или равна сегодняшней',
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('site.newreception',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE),
                        'users' => $users,
                        'patients' => $patients,
                        'cabinets' => $cabinets,
                        'diagnosis' => $diagnosis]);
            }else{
                $rec = \Model\Reception::create($request->all());
                $rec->save();
                return new View('site.newreception', ['message' => 'Запись добавлена',
                    'users' => $users,
                    'patients' => $patients,
                    'cabinets' => $cabinets,
                    'diagnosis' => $diagnosis]);
            }
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
        if ($request->method === 'POST' &&
            $reception->update(['diagnosis_id' => $request->diagnosis_id])) {

            return new View('site.reception', ['message' => 'Запись на приём изменена',
                'reception' => $reception,
                'diagnosis' => $diagnosis,]);

        }
        return (new View())->render('site.reception', [
            'reception' => $reception,
            'diagnosis' => $diagnosis,
        ]);
    }
}
