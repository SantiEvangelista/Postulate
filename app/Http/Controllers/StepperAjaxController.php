<?php

namespace App\Http\Controllers;

use App\Http\Requests\Step1FormRequest;
use App\Http\Requests\Step2FormRequest;
use App\Http\Requests\Step3FormRequest;
use App\Models\Empresas;
use App\Models\Generador;
use App\Models\Lenguaje;
use App\Models\Otros_estudios;
use App\Models\Rasgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class StepperAjaxController extends Controller
{
    public function index()
    {
        return view('full-stepper');
    }

    public function getStepContent($step)
    {
        $viewPath = "stepper.step{$step}-content";
        
        

        return View::make($viewPath)->render();
    }

    public function submitStep1(Step1FormRequest $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Datos personales validados correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => ['general' => [$e->getMessage()]]
            ], 422);
        }
    }

    public function submitStep2(Step2FormRequest $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Datos educativos validados correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => ['general' => [$e->getMessage()]]
            ], 422);
        }
    }

    public function submitStep3(Step3FormRequest $request)
    {
        try {
            // Crear el CV con todos los datos
            $cv = new Generador($request->all());
                //'datos_interes' => $request->input('datos_interes'),
            
            $cv->save();

            // Crear empresas
            // if ($request->has('empresas')) {
            //     foreach ($request->input('empresas') as $empresa) {
            //         Empresas::create([
            //             'generador_id' => $cv->id,
            //             'company_name' => $empresa['nombre'],
            //             'charge' => $empresa['cargo'],
            //             'start_date' => $empresa['fecha_inicio'],
            //             'end_date' => $empresa['fecha_fin'],
            //         ]);
            //     }
            // }

            // Crear lenguajes
            // if ($request->has('lenguajes')) {
            //     foreach ($request->input('lenguajes') as $lenguaje) {
            //         Lenguaje::create([
            //             'generador_id' => $cv->id,
            //             'nombre' => $lenguaje['nombre']
            //         ]);
            //     }
            // }

            // Crear rasgos
            // if ($request->has('rasgos')) {
            //     foreach ($request->input('rasgos') as $rasgo) {
            //         Rasgo::create([
            //             'generador_id' => $cv->id,
            //             'nombre' => $rasgo['nombre']
            //         ]);
            //     }
            // }

            // Crear otros estudios
            //if ($request->has('otros_estudios')) {
            //     foreach ($request->input('otros_estudios') as $estudio) {
            //         Otros_estudios::create([
            //             'generador_id' => $cv->id,
            //             'nombre' => $estudio['nombre']
            //         ]);
            //     }
            // }

            return response()->json([
                'success' => true,
                'message' => 'CV generado correctamente',
                'redirect' => route('generador.success'),
                'cv' => $cv
            ]);
        } catch (\Exception $e) {
            Log::error('Error en submitStep3: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'errors' => ['general' => [$e->getMessage()]]
            ], 422);
        }
    }
} 