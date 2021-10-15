<?php

namespace App\Http\Controllers;

use App\Models\Generador;
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
        # code...
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

}
