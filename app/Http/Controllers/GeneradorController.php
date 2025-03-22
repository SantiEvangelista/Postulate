<?php

namespace App\Http\Controllers;

use App\Http\Requests\Step1FormRequest;
use App\Http\Requests\Step2FormRequest;
use App\Http\Requests\Step3FormRequest;
use App\Models\Empresas;
use App\Models\Otros_estudios;
use App\Models\Generador;
use App\Models\Lenguaje;
use App\Models\Rasgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('index');
    }

    // vistas GET
    public function createPaso1(Request $request)
    {
        $sessionData = $request->session()->get('cv');
        return view('stepper.step1', ['sessionData' => $sessionData]);
    }
    
    public function createPaso2(Request $request)
    {
        $sessionData = $request->session()->get('cv');
        return view('stepper.step2', ['sessionData' => $sessionData]);
    }

    public function createPaso3(Request $request)
    {
        $sessionData = $request->session()->get('cv');
        $lenguajes = $request->session()->get('lenguajes', collect());
        $rasgos = $request->session()->get('rasgos', collect());
        $otrosEstudios = $request->session()->get('otros_estudios', collect());
        
        return view('stepper.step3', [
            'sessionData' => $sessionData,
            'lenguajes' => $lenguajes,
            'rasgos' => $rasgos,
            'otrosEstudios' => $otrosEstudios
        ]);
    }


    // vistas POST
    public function post_paso1(Request $request, Step1FormRequest $validated)
    {
        $request->session()->flush();
        $cv = new Generador($validated->all());
        $request->session()->put('cv', $cv);
        
        return redirect()->route('generador.paso2.create');
    }

    public function post_paso2(Request $request, Step2FormRequest $validated)
    {
        $cv = $request->session()->get('cv');
        
        $collection_empresas = collect();

        if ($request->has('addMoreInputFields')) {
            $collection_empresas = collect($request->addMoreInputFields)->map(function ($puesto) {
                return new Empresas([
                    'company_name' => $puesto['nombre'],
                    'charge' => $puesto['cargo'],
                    'start_date' => $puesto['fecha_inicio'],
                    'end_date' => $puesto['fecha_fin'],
                ]);
            });
        }

        $cv->fill([
            'secundario' => $validated['secundario'],
            'orientacion' => $validated['orientacion'],
            'fecha_inicio_secundario' => $validated['fecha_inicio_secundario'],
            'fecha_fin_secundario' => $validated['fecha_fin_secundario'],
            'terciaria' => $validated['terciaria'],
            'orientacion_terciaria' => $validated['orientacion_terciaria'],
            'fecha_inicio_terciaria' => $validated['fecha_inicio_terciaria'],
            'fecha_fin_terciaria' => $validated['fecha_fin_terciaria'],
        ]);

        $request->session()->put('empresas', $collection_empresas);
        $request->session()->put('cv', $cv);
        
        return redirect()->route('generador.paso3.create');
    }

    public function post_paso3(Request $request, Step3FormRequest $validated)
    {
        try {
            $cv = $request->session()->get('cv');
            
            $collection_empresas = $request->session()->get('empresas', collect());

            // Set default values and handle nulls
            $cv->fecha_fin_secundario = $cv->fecha_fin_secundario ?? 'Sin finalizar';
            $cv->objetivo_profesional = $validated['objetivo_profesional'];
            $cv->id = 1;
            $cv->datos_interes = $validated['datos_interes'];

            // Initialize collections
            $lenguajes = collect($request->input('lenguajes', []))->map(function ($lenguaje) use ($cv) {
                return new Lenguaje([
                    'nombre' => $lenguaje['nombre'],
                    'generador_id' => $cv->id
                ]);
            });

            $rasgos = collect($request->input('rasgos', []))->map(function ($rasgo) use ($cv) {
                return new Rasgo([
                    'nombre' => $rasgo['nombre'],
                    'generador_id' => $cv->id
                ]);
            });

            $otros_estudios = collect($request->input('otros_estudios', []))->map(function ($estudio) use ($cv) {
                return new Otros_estudios([
                    'nombre' => $estudio['nombre'],
                    'generador_id' => $cv->id
                ]);
            });

            $empresas = $collection_empresas->map(function ($empresa) use ($cv) {
                $empresa->generador_id = $cv->id;
                return $empresa;
            });

            // Store all data in session
            $request->session()->put([
                'cv' => $cv,
                'lenguajes' => $lenguajes,
                'rasgos' => $rasgos,
                'empresas' => $empresas,
                'otros_estudios' => $otros_estudios
            ]);

            return redirect()->route('generador.success');
            
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function clearSession(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('generador.paso1.create');
    }


    public function success(Request $request)
    {
        $cv = $request->session()->get('cv');
        $empresas = $request->session()->get('empresas');
        $rasgos = $request->session()->get('rasgos');
        $lenguajes = $request->session()->get('lenguajes');

        return view('sucess', ['cv' => $cv]);
    }

}
