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
    public static function employees(Request $request): string
    {
        $employees = User::all();
        if ($request->method === 'POST') {
            $employees = User::where('surname', $request->find)->get();
            return (new View())->render('site.employees', ['employees' => $employees]);
        }
        return (new View())->render('site.employees', ['employees' => $employees]);
    }

    public static function employee(Request $request): string
    {
        $user = User::where('id', $request->id)->first();
        return (new View())->render('site.user', [
            'user' => $user]);
    }
}
