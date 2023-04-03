<?php

namespace Controller;

use Model\Patient;
use Model\Reception;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;


class Employees
{
    public static function employees(): string
    {
        $employees = User::all();
        return (new View())->render('site.employees', ['employees' => $employees]);
    }

    public static function employee(Request $request): string
    {
        $user = User::where('id', $request->id)->first();
        $receptions = Reception::where('id', $user->id)->get();
//        $users = User::where('id', $receptions->id)->get();
//        $cabinets = Cabinet::where('cabinet_id', $request->cabinet_id)->get();
        $patients = [];
        foreach ($receptions as $reception){
            $patients[] = \Model\Patient::where('patient_id', $reception->patient_id)->first();
        }
        return (new View())->render('site.user', [
            'patients' => $patients,
//            'users' => $users,
//            'cabinets' => $cabinets,
            'receptions' => $receptions,
            'user' => $user
        ]);
    }
}
