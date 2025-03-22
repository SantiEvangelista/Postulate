<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Otros_estudios;
use App\Models\Generador;
use App\Models\Lenguaje;
use App\Models\Rasgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // vistas GET
    public function createPaso1(Request $request)
    {
        $sessionData= $request->session()->get('cv');
        return view('stepper.step1',['sessionData' => $sessionData]);
    }
    
    public function createPaso2()
    {
        return view('stepper.step2');
    }

    public function createPaso3()
    {
        return view('stepper.step3');
    }

    public function success(Request $request)
    {
        $cv=$request->session()->get('cv');
        $empresas=$request->session()->get('empresas');
        $rasgos=$request->session()->get('rasgos');
        $lenguajes=$request->session()->get('lenguajes');

        return view('sucess',['cv' => $cv]);
    }

    // vistas POST
    public function post_paso1(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'surname' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'birthday' => 'required|date',
            'adress' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|regex:/^\+?[1-9]\d{1,14}$/',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $request->session()->flush();
        if(empty($request->session()->get('cv'))){
            $cv = new Generador($validated);
            $request->session()->put(['cv'=>$cv]);
        }else{
            $request->session()->flush();
            $cv = new Generador($validated);
            $request->session()->put(['cv'=>$cv]);
        }

        return redirect()->route('generador.paso2.create'); 
    }

    public function post_paso2(Request $request)
    {
        $cv = $request->session()->get('cv');

        $validated = $request->validate([
            'secundario' => 'required',
            'orientacion' => 'required',
            'fecha_inicio_secundario' => 'required']);
        $validated = $request->validate([
            'terciaria' => 'required',
            'orientacion_terciaria' => 'required',
            'fecha_inicio_terciaria' => 'required']);
        $collection_empresas=collect();
        if($request->addMoreInputFields[0]['nombre']!=null and $request->addMoreInputFields[0]['cargo']!=null){
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

        $cv->secundario=$request->secundario;
        $cv->orientacion=$request->orientacion;
        $cv->fecha_inicio_secundario=$request->fecha_inicio_secundario;
        $cv->fecha_fin_secundario=$request->fecha_fin_secundario;

            
        $cv->terciaria=$request->terciaria;
        $cv->orientacion_terciaria=$request->orientacion_terciaria;
        $cv->fecha_inicio_terciaria=$request->fecha_inicio_terciaria;
        $cv->fecha_fin_terciaria=$request->fecha_fin_terciaria;
    
        $request->session()->put(['empresas'=>$collection_empresas]);
        $request->session()->put(['cv'=>$cv]);
        return redirect()->route('generador.paso3.create');

    }

    public function post_paso3(Request $request)
    {
        $cv = $request->session()->get('cv');
        $collection_empresas = $request->session()->get('empresas');

        $validated = $request->validate([
            'objetivo_profesional' => 'required',
            'lenguajes' => 'required',
            'datos_interes' => 'required',
            'otros_estudios' => 'required',
            'rasgos' => 'required']);
            
        
        try {
            
                if ($cv->fecha_fin_secundario == null) $cv->fecha_fin_secundario='Sin finalizar';
                $cv->objetivo_profesional=$request->objetivo_profesional;
                $cv->id=1;
                $cv->datos_interes=$request->datos_interes;
                

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

}
