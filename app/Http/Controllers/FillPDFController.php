<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class FillPDFController extends Controller
{
    public function finalPDF(Request $request)
    {
        $cv = $request->session()->get('cv');
        if ($cv === null) {
            return redirect()->route('generador.paso1.create');
        }
        $pdf = PDF::loadView('pdf.cv-template', ['cv' => $cv->toArray()]);
        $pdf->setPaper('A4', 'portrait');

        $request->session()->forget('cv');
        
        return $pdf->stream('cv.pdf');
    }
}
