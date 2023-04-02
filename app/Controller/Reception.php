<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;


class Reception
{

    public static function receptions(): string
    {
        $receptions = \Model\Reception::all();
        return (new View())->render('site.receptions', ['receptions' => $receptions]);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && \Model\Reception::create($request->all())) {
            return new View('site.newreception');
        }
        return new View('site.newreception');
    }
}
