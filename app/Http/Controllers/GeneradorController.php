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

    public function success(Request $request)
    {
        $cv = $request->session()->get('cv');
        $empresas = $request->session()->get('empresas');
        $rasgos = $request->session()->get('rasgos');
        $lenguajes = $request->session()->get('lenguajes');

        return view('sucess', ['cv' => $cv]);
    }

    // vistas POST
    public function post_paso1(Request $request, Step1FormRequest $validated)
    {
        $request->session()->flush();

        if(empty($request->session()->get('cv'))){
            $cv = new Generador($validated->all());
            $request->session()->put(['cv'=>$cv]);
        }else{
            $request->session()->flush();
            $cv = new Generador($validated->all());
            $request->session()->put(['cv'=>$cv]);
        }

        return redirect()->route('generador.paso2.create'); 
    }

    public function post_paso2(Request $request, Step2FormRequest $validated)
    {
        $cv = $request->session()->get('cv');

        
            
        $collection_empresas=collect();

        if(isset($request->addMoreInputFields)){
            foreach ($request->addMoreInputFields as $puestos) {
                $empresas= new Empresas ([
                   'company_name' => $puestos['nombre'],
                   'charge' => $puestos['cargo'],
                   'start_date' => $puestos['fecha_inicio'],
                   'end_date' => $puestos['fecha_fin'],
                ]);
                $collection_empresas=$collection_empresas->push($empresas);
            }
        }

        $cv->secundario=$validated['secundario'];
        $cv->orientacion=$validated['orientacion'];
        $cv->fecha_inicio_secundario=$validated['fecha_inicio_secundario'];
        $cv->fecha_fin_secundario=$validated['fecha_fin_secundario'];

        $cv->terciaria=$validated['terciaria'];
        $cv->orientacion_terciaria=$validated['orientacion_terciaria'];
        $cv->fecha_inicio_terciaria=$validated['fecha_inicio_terciaria'];
        $cv->fecha_fin_terciaria=$validated['fecha_fin_terciaria'];
    
        $request->session()->put(['empresas'=>$collection_empresas]);
        $request->session()->put(['cv'=>$cv]);
        return redirect()->route('generador.paso3.create');

    }

    public function post_paso3(Request $request, Step3FormRequest $validated)
    {
        $cv = $request->session()->get('cv');
        $collection_empresas = $request->session()->get('empresas');

        try {
            
                if ($cv->fecha_fin_secundario == null) $cv->fecha_fin_secundario='Sin finalizar';
                $cv->objetivo_profesional=$validated['objetivo_profesional'];
                $cv->id=1;
                $cv->datos_interes=$validated['datos_interes'];
                

                $lenguajes=collect();
                $rasgos=collect();
                $empresas=collect();
                $otros_estudios=collect();
                
                foreach ($collection_empresas as $empresa ) {
                    $empresa->generador_id=$cv->id;
                    $empresas=$empresas->push($empresa);
                }
                foreach ($request->lenguajes as $lenguaje) {
                    $lenguaje= new Lenguaje([
                        'nombre' => $lenguaje['nombre'],
                        'generador_id'=>$cv->id
                    ]);
                    $lenguajes=$lenguajes->push($lenguaje);
                }
                foreach ($request->rasgos as $rasgo) {
                    $rasgo=new Rasgo([
                        'nombre' => $rasgo['nombre'],
                        'generador_id'=>$cv->id
                    ]);
                    $rasgos=$rasgos->push($rasgo);
                }

                foreach ($request->otros_estudios as $otro_estudio) {
                    $otro_estudio=new Otros_estudios([
                        'nombre' => $otro_estudio['nombre'],
                        'generador_id'=>$cv->id
                    ]);
                    $otros_estudios=$otros_estudios->push($otro_estudio);
                }
                
                $request->session()->put(['cv'=>$cv]);
                $request->session()->put(['lenguajes'=>$lenguajes]);
                $request->session()->put(['rasgos'=>$rasgos]);
                $request->session()->put(['empresas'=>$empresas]);

                $request->session()->put(['otros_estudios'=>$otros_estudios]);

                return redirect()->route('generador.success');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function clearSession(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('generador.paso1.create');
    }

}
