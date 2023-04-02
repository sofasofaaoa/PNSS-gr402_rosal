<?php

namespace Controller;

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
}
