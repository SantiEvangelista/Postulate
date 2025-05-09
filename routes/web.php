<?php

use App\Http\Controllers\FillPDFController;
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

Route::get('/', [GeneradorController::class, 'index'])->name('home');

//Vista PDF
Route::get('/generar-cv-moderno', [FillPDFController::class, 'finalPDF'])->name('generar.cv.moderno');


// Vistas GET
Route::get('/generarCV/paso/1', [GeneradorController::class, 'createPaso1'])->name('generador.paso1.create');
Route::get('/generarCV/paso/2', [GeneradorController::class, 'createPaso2'])->name('generador.paso2.create');
Route::get('/generarCV/paso/3', [GeneradorController::class, 'createPaso3'])->name('generador.paso3.create');

Route::get('/generarCV/fin', [GeneradorController::class, 'success'])->name('generador.success');

// Vistas POST
Route::post('/generarCV/paso/1', [GeneradorController::class, 'postPaso1'])->name('generador.paso1.store');
Route::post('/generarCV/paso/2', [GeneradorController::class, 'postPaso2'])->name('generador.paso2.store');
Route::post('/generarCV/paso/3', [GeneradorController::class, 'postPaso3'])->name('generador.paso3.store');


Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

Route::get('/generador/clear-session', [GeneradorController::class, 'clearSession'])->name('generador.clearSession');


