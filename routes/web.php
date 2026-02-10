<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mi-ruta-a', function () {
    return 'HOLA ESTA ES MI RUTA';
});

Route::get('/php-basico', function () {
    return 'ESTOY APRENDIENDO PHP';
});
