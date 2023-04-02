<?php

namespace Middlewares;

use Model\User;
use Src\Request;

class RegMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не админ и не работник регистрации, то редирект на главную
        if (!(new User)->is_reg() && !(new User)->is_admin()) {
            app()->route->redirect('/hello');
        }
    }
}
