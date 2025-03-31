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

        // Convert to array and ensure all required fields are present
        $cvArray = $cv->toArray();
        
        // Add default values for required fields if they're missing
        $requiredFields = [
            'secundario' => 'No especificado',
            'orientacion' => 'No especificada',
            'fecha_inicio_secundario' => 'No especificada',
            'fecha_fin_secundario' => 'Sin finalizar',
            'terciaria' => 'No especificada',
            'orientacion_terciaria' => 'No especificada',
            'fecha_inicio_terciaria' => 'No especificada',
            'fecha_fin_terciaria' => 'Sin finalizar',
            'objetivo_profesional' => 'No especificado',
            'datos_interes' => 'No especificados'
        ];

        foreach ($requiredFields as $field => $defaultValue) {
            if (!isset($cvArray[$field]) || empty($cvArray[$field])) {
                $cvArray[$field] = $defaultValue;
            }
        }

        $pdf = PDF::loadView('pdf.cv-template', ['cv' => $cvArray]);
        $pdf->setPaper('A4', 'portrait');

        $request->session()->forget('cv');
        
        return $pdf->stream('cv.pdf');
    }
}
