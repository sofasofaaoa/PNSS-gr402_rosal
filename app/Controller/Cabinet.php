<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;


class Cabinet
{
    public static function cabinets(): string
    {
        $cabinets = \Model\Cabinet::all();
        return (new View())->render('site.cabinets', ['cabinets' => $cabinets]);
    }
}
