<?php

namespace Controller;

use Model\Patient;
use Model\User;
use Src\Validator\Validator;
use Src\View;
use Src\Request;
use Src\Auth\Auth;


class Diagnosis
{

    public static function diagnosis(Request $request): string
    {
        $diagnosis = \Model\Diagnosis::all();
            if ($request->method === 'POST') {
                $validator = new Validator($request->all(), [
                    'title' => ['required', 'russian']
                ], [
                    'required' => 'Поле :field пусто',
                    'russian' => 'Только русский алфавит'
                ]);

                if($validator->fails()){
                    return new View('site.diagnosis', ['diagnosis' => $diagnosis, 'message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
                }else{
                    $d = \Model\Diagnosis::create($request->all());
                    $d->save();
                    return new View('site.diagnosis', ['diagnosis' => $diagnosis, 'message' => 'Диагноз добавлен']);
                }
            }
        return (new View())->render('site.diagnosis', ['diagnosis' => $diagnosis]);

    }
    public function new(Request $request): string
    {

        return new View('site.diagnosis');
    }
}
