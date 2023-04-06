<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'admin' => \Middlewares\AdminMiddleware::class,
        'reg' => \Middlewares\RegMiddleware::class,
        'doc' => \Middlewares\DocMiddleware::class,    ],
    'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
    ],
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'img' => \Validators\IMGValidator::class,
        'russian' => \Validators\RussianValidator::class,
        'login' =>\Validators\LoginValidator::class,
        'length' => \Validators\LengthValidator::class,
        'dateofrec' => \Validators\DateofrecValidator::class,
        'dateofbirth' => \Validators\DateofbirthValidator::class
    ]

];
