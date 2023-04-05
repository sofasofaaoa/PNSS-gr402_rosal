<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/patients', [Controller\Patients::class, 'patients'])
    ->middleware('auth');
Route::add('GET', '/receptions', [Controller\Reception::class, 'receptions'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/reception', [Controller\Reception::class, 'reception'])
    ->middleware('doc');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/cabinets', [Controller\Cabinet::class, 'cabinets'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/employees', [Controller\Employees::class, 'employees'])
    ->middleware('admin');
Route::add('GET', '/employee', [Controller\Employees::class, 'employee'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/diagnosis', [Controller\Diagnosis::class, 'diagnosis'])
    ->middleware('doc');
Route::add('GET', '/newdiag', [Controller\Diagnosis::class, 'new'])
    ->middleware('admin');
Route::add('GET', '/patient', [Controller\Patients::class, 'patient'])
    ->middleware('doc');
Route::add(['GET', 'POST'], '/newpatient', [Controller\Patients::class, 'newpatient'])
    ->middleware('reg');
Route::add(['GET', 'POST'], '/newreception', [Controller\Reception::class, 'new'])
    ->middleware('reg');