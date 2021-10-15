<?php

use App\Http\Controllers\GeneradorController;
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

Route::get('/', function () {return view('index');})->name('index');

// Vistas GET
Route::get('/generarCV/paso/1', [GeneradorController::class, 'create_paso1'])->name('generador.paso1.create');
Route::get('/generarCV/paso/2', [GeneradorController::class, 'create_paso2'])->name('generador.paso2.create');

// Vistas POST
Route::post('/generarCV/paso/1', [GeneradorController::class, 'post_paso1'])->name('generador.paso1.store');
