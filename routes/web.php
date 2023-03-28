<?php

use Src\Route;

Route::add('go', [Controller\Site::class, 'index']);
Route::add('heh', [Controller\Site::class, 'heh']);
Route::add('hello', [Controller\Site::class, 'hello']);
