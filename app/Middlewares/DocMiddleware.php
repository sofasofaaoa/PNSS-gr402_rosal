<?php

namespace Middlewares;

use Model\User;
use Src\Request;

class DocMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не админ и не доктор, то редирект на главную
        if (!(new User)->is_doctor() && !(new User)->is_admin()) {
            app()->route->redirect('/hello');
        }
    }
}
