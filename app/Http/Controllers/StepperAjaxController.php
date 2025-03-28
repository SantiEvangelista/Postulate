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
            
            return redirect()->route('generador.success');
            
        } catch (\Exception $e) {
            Log::error('Error en submitStep3: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'errors' => ['general' => [$e->getMessage()]]
            ], 422);
        }
    }
} 