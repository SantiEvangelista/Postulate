<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
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
    public function create_paso1()
    {
        return view('stepper.step1');
    }
    
    public function create_paso2()
    {
        return view('stepper.step2');
    }

    public function create_paso3()
    {
        return view('stepper.step3');
    }

    public function success()
    {
        return view('sucess',['cv' => Generador::latest()->first()]);
    }

    // vistas POST
    public function post_paso1(Request $request)
    {
        $validated = $request->validate(['name' => 'required','surname' => 'required',
            'birthday' => 'required','adress' => 'required','email' => 'required',
            'phone' => 'required']);

            if($request->file('imagen')){
                $fileName = time().'_'.$request->imagen[0]->getClientOriginalName();
                $filePath = $request->imagen[0]->storeAs('uploads', $fileName, 'public');
                
                $validated=$validated+[$filePath];
            }

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
        $collection_empresas=collect();
        if($request->addMoreInputFields[0]['nombre']!=null and $request->addMoreInputFields[0]['cargo']!=null){
            foreach ($request->addMoreInputFields as $puestos) {
                $empresas=Empresas::new([
                   'company_name' => $puestos['nombre'],
                   'charge' => $puestos['cargo'],
                   'start_date' => $puestos['fecha_inicio'],
                   'end_date' => $puestos['fecha_fin']
                ]);
                $collection_empresas=$collection_empresas->push($empresas);
            }
        }

        $cv->secundario=$request->secundario;
        $cv->orientacion=$request->orientacion;
        $cv->fecha_inicio_secundario=$request->fecha_inicio_secundario;
        $cv->fecha_fin_secundario=$request->fecha_fin_secundario;
    
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
            'rasgos' => 'required']);



        
        try {
            DB::transaction(function () use ($cv,$request,$collection_empresas) {
                if ($cv->fecha_fin_secundario == null) $cv->fecha_fin_secundario='Sin finalizar';
                $cv->objetivo_profesional=$request->objetivo_profesional;
                $cv->save();

                foreach ($collection_empresas as $empresa ) {
                    $empresa->generador_id=$cv->id;
                    $empresa->save();
                }
                foreach ($request->lenguajes as $lenguaje) {
                    Lenguaje::firstOrCreate(
                        ['nombre' => $lenguaje['nombre'],
                        ['generador_id'=>$cv->id]
                    ]);
                }
                foreach ($request->rasgos as $rasgo) {
                    Rasgo::firstOrCreate(
                        ['nombre' => $rasgo['nombre'],
                        ['generador_id'=>$cv->id]
                    ]);
                }
            });
                return redirect()->route('generador.success');
        } catch (\Throwable $th) {
            return $th;
        }
    }

}
