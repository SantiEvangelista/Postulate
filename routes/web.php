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
    return view('index');
})->name('index');

Route::get('/generarCV/paso1', function () {
    return view('stepper.step1');
})->name('generador.paso1.create');

Route::get('/generarCV/paso2', function () {
    return view('stepper.step2');
})->name('generador.paso2.create');