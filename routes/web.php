<?php

use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\GeneradorController;
use App\Http\Controllers\StepperAjaxController;
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
Route::get('/generatedPDF',[FillPDFController::class,'Addtopdf'])->name('resultado.pdf');;
Route::get('/generar-pdf-ia', [FillPDFController::class, 'IAGeneratedPdf'])->name('generar.pdf.ia');


// Vistas GET
Route::get('/generarCV/paso/1', [GeneradorController::class, 'createPaso1'])->name('generador.paso1.create');
Route::get('/generarCV/paso/2', [GeneradorController::class, 'createPaso2'])->name('generador.paso2.create');
Route::get('/generarCV/paso/3', [GeneradorController::class, 'createPaso3'])->name('generador.paso3.create');

Route::get('/generarCV/fin', [GeneradorController::class, 'success'])->name('generador.success');

// Vistas POST
Route::post('/generarCV/paso/1', [GeneradorController::class, 'post_paso1'])->name('generador.paso1.store');
Route::post('/generarCV/paso/2', [GeneradorController::class, 'post_paso2'])->name('generador.paso2.store');
Route::post('/generarCV/paso/3', [GeneradorController::class, 'post_paso3'])->name('generador.paso3.store');

Route::get('/generar-cv-moderno', [FillPDFController::class, 'generateModernPDF'])->name('generar.cv.moderno');

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

Route::get('/generador/clear-session', [GeneradorController::class, 'clearSession'])->name('generador.clearSession');

// Nueva ruta para el stepper dinámico
Route::get('/generador/full-stepper', [StepperAjaxController::class, 'index'])->name('generador.full-stepper');
Route::get('/generador/paso{step}/content', [StepperAjaxController::class, 'getStepContent'])->name('stepper.ajax.content');
Route::post('/generador/paso1/submit', [StepperAjaxController::class, 'submitStep1'])->name('stepper.ajax.submit.step1');
Route::post('/generador/paso2/submit', [StepperAjaxController::class, 'submitStep2'])->name('stepper.ajax.submit.step2');
Route::post('/generador/paso3/submit', [StepperAjaxController::class, 'submitStep3'])->name('stepper.ajax.submit.step3');


