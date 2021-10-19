<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Generador;
use App\Models\Lenguaje;
use App\Models\Rasgo;
use Illuminate\Http\Request;

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

    // vistas POST
    public function post_paso1(Request $request)
    {
        $validated = $request->validate(['name' => 'required','surname' => 'required',
            'birthday' => 'required','adress' => 'required','email' => 'required',
            'phone' => 'required']);

            if($request->file('imagen')){
                $fileName = time().'_'.$request->imagen->getClientOriginalName();
                $filePath = $request->file('imagen')->storeAs('uploads', $fileName, 'public');
                $validated['image'] = $filePath;
            }

        if(empty($request->session()->get('cv'))){
            $cv = new Generador($validated);
            $request->session()->put(['cv'=>$cv]);

        }else{
            $cv = $request->session()->get('cv');
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
            
        if($request->addMoreInputFields[0]['nombre']!=null and $request->addMoreInputFields[0]['cargo']!=null){
            foreach ($request->addMoreInputFields as $puestos) {
                Empresas::create([
                   'company_name' => $puestos['nombre'],
                   'charge' => $puestos['cargo'],
                   'start_date' => $puestos['fecha_inicio'],
                   'end_date' => $puestos['fecha_fin']
                ]);
            }
        }

        $cv->secundario=$request->secundario;
        $cv->orientacion=$request->orientacion;
        $cv->fecha_inicio_secundario=$request->fecha_inicio_secundario;
        $cv->fecha_fin_secundario=$request->fecha_fin_secundario;
    
        $request->session()->put(['cv'=>$cv]);
        return redirect()->route('generador.paso3.create');

    }

    public function post_paso3(Request $request)
    {
        $cv = $request->session()->get('cv');

        $validated = $request->validate([
            'objetivo_profesional' => 'required',
            'lenguajes' => 'required',
            'rasgos' => 'required']);

        foreach ($request->lenguajes as $lenguaje) {
            Lenguaje::firstOrCreate(['nombre' => $lenguaje['nombre']]);
        }

        foreach ($request->rasgos as $rasgo) {
            Rasgo::firstOrCreate(['nombre' => $rasgo['nombre']]);
        }
        
        dd(Rasgo::all());
        return redirect()->route('generador.paso3.create');

    }

}
