<?php

namespace Middlewares;

use Model\User;
use Src\Request;

class AdminMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не админ, то редирект на главную
        if (!(new User)->is_admin()) {
            app()->route->redirect('/hello');
        }
    }
}
