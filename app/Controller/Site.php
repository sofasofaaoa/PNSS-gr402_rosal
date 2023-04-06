<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;



class Site
{

    public function hello(): string
    {
        return new View('site.hello');
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login', 'login', 'length'],
                'password' => ['required', 'login', 'length'],
                'name' => ['required', 'russian'],
                'surname' => ['required', 'russian'],
                'sex' => ['required'],
                'date_of_birth' => ['required', 'dateofbirth'],
                'job_title_id' => ['required'],
                'filename' => ['img']
            ], [
                'dateofbirth' => 'Дата должна быть меньше или равна сегодняшней',
                'required' => 'Поле :field пусто',
                'length' => 'Не менее 6 символов в поле :field',
                'unique' => 'Поле :field должно быть уникально',
                'img' => 'Расширение файла должно быть .JPG',
                'russian' => 'Только русский алфавит в поле :field',
                'login' => 'Только латиница, цифры и -_ в поле :field'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }else{
                $user = User::create($request->all());
                $user->photo($_FILES['filename'], __DIR__ . '/../../public/img/');
                $user->save();
                return new View('site.signup', ['message' => 'Сотрудник успешно добавлен, фото тоже']);
            }
        }
        return new View('site.signup');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

}
