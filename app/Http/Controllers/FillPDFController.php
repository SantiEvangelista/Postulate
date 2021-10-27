<?php

namespace App\Http\Controllers;

use App\Models\Generador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

class FillPDFController extends Controller
{
    public function Addtopdf(Request $request)
    {
        $empresas = $request->session()->get('empresas');
        $otros_estudios = $request->session()->get('otros_estudios');

        $pdf = new Fpdi();

        // add a page
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $cv = $request->session()->get('cv');
        // set the source file
        
        if (count($empresas) >= 2) {
            $path = public_path("Pdf/CV-2_Experiencias.pdf");

            $pdf->setSourceFile($path);

            // import page 1
            $tplId = $pdf->importPage(1);


            // use the imported page and place it at point 10,10 with a width of 100 mm
            $pdf->useTemplate($tplId, null, null, null, 210, true);

            $pdf->SetXY(10, 10); // Nombre y apellido

            $rasgos = $request->session()->get('rasgos');
            $lenguajes = $request->session()->get('lenguajes');


            if ($cv != null) {

                $pdf->Write(0.2, $cv->name . ' ' . $cv->surname);// Nombre y apellido

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(35, 25); // Telefono
                $pdf->Write(0.2, $cv->phone);

                $pdf->SetXY(35, 28); // Email
                $pdf->Write(0.2, $cv->email);

                $pdf->SetXY(35, 31); // Direccion
                $pdf->Write(0.2, $cv->adress);
                $pdf->SetXY(18, 48); // objetivo Profesional
                $pdf->Write(0.2, $cv->objetivo_profesional);

                $pdf->SetXY(18, 65); // Formacion Academica
                $pdf->Write(0.2, $cv->secundario . ' - ' . $cv->orientacion);

                $pdf->SetXY(18, 85); // Formacion Complementaria
                $pdf->Write(0.2, $cv->terciaria . ' - ' . $cv->orientacion_terciaria);
                
                    $pdf->SetXY(35, 107); //Experiencias Laborales
                    $pdf->Write(0.2, $empresas[0]->start_date . ' - ' . $empresas[0]->end_date . '  -  ' . $empresas[0]->company_name);

                    $pdf->SetXY(72, 112.5);
                    $pdf->Write(0.2, $empresas[0]->charge);

                    $pdf->SetXY(35, 121);
                    $pdf->Write(0.2, $empresas[1]->start_date . ' - ' . $empresas[1]->end_date . '  -  ' . $empresas[1]->company_name);

                    $pdf->SetXY(72, 127);
                    $pdf->Write(0.2, $empresas[1]->charge);
 
                    $pdf->SetXY(18, 143); // Informatica
                foreach ($otros_estudios as $otro_estudio) {
                    $pdf->Write(0.2, $otro_estudio->nombre);
                    $pdf->SetXY(30, 143); // Informatica
                }

                $pdf->SetXY(18, 162); // Idiomas

                foreach ($lenguajes as $idioma) {
                    $pdf->Write(0.2, $idioma->nombre);
                    $pdf->SetXY(30, 162);
                }

                $pdf->SetXY(18, 180); // Otros datos de interes
                $pdf->Write(0.2, $cv->datos_interes);

            } else {
                $pdf->Write(0.2, "");

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(35, 25); // Telefono
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 28); // Email
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 31); // Direccion
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 48); // objetivo Profesional
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 65); // Formacion Academica
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 107); //Experiencias Laborales
                $pdf->Write(0.2, "");

                $pdf->SetXY(72, 112.5);
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 121);
                $pdf->Write(0.2, "");

                $pdf->SetXY(72, 127);
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 162); // Idiomas
                $pdf->Write(0.2, "");
            }

            // Preview PDF
            $pdf->Output('I', "Curriculum-Generado.pdf");
        } elseif (count($empresas) >= 1) {

            //CV CON SOLO 1 EXPERIENCIA
            //REVISAR LAS POSICIONES
            $path = public_path("Pdf/CV-1_Experiencias.pdf");

            $pdf->setSourceFile($path);

            // import page 1
            $tplId = $pdf->importPage(1);


            // use the imported page and place it at point 10,10 with a width of 100 mm
            $pdf->useTemplate($tplId, null, null, null, 210, true);

            $pdf->SetXY(10, 10); // Nombre y apellido

            $empresas = $request->session()->get('empresas');
            $rasgos = $request->session()->get('rasgos');
            $lenguajes = $request->session()->get('lenguajes');


            if ($cv != null) {

                $pdf->Write(0.2, $cv->name . ' ' . $cv->surname);// Nombre y apellido

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(35, 25); // Telefono
                $pdf->Write(0.2, $cv->phone);

                $pdf->SetXY(35, 28); // Email
                $pdf->Write(0.2, $cv->email);

                $pdf->SetXY(35, 31); // Direccion
                $pdf->Write(0.2, $cv->adress);

                $pdf->SetXY(18, 48); // objetivo Profesional
                $pdf->Write(0.2, $cv->objetivo_profesional);

                $pdf->SetXY(18, 65); // Formacion Academica
                $pdf->Write(0.2, $cv->secundario . '-' . $cv->orientacion);

                $pdf->SetXY(18, 85); // Formacion Complementaria
                $pdf->Write(0.2, $cv->terciaria . ' - ' . $cv->orientacion_terciaria);

 
                    $pdf->SetXY(35, 107); //Experiencias Laborales
                    $pdf->Write(0.2, $empresas[0]->start_date . ' - ' . $empresas[0]->end_date . '  -  ' . $empresas[0]->company_name);

                    $pdf->SetXY(72, 112.5);
                    $pdf->Write(0.2, $empresas[0]->charge);
                

                $pdf->SetXY(18, 131); // Informatica
                foreach ($otros_estudios as $otro_estudio) {
                    $pdf->Write(0.2, $otro_estudio->nombre);
                    $pdf->SetXY(30, 131); // Informatica
                }

                $pdf->SetXY(18, 151); // Idiomas
                foreach ($lenguajes as $idioma) {
                    $pdf->Write(0.2, $idioma->nombre);
                    $pdf->SetXY(30, 151);
                }

                $pdf->SetXY(18, 167); // Otros datos de interes
                $pdf->Write(0.2, $cv->datos_interes);

            } else {
                $pdf->Write(0.2, "");

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(35, 25); // Telefono
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 28); // Email
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 31); // Direccion
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 48); // objetivo Profesional
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 65); // Formacion Academica
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 107); //Experiencias Laborales
                $pdf->Write(0.2, "");

                $pdf->SetXY(72, 112.5);
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 121);
                $pdf->Write(0.2, "");

                $pdf->SetXY(72, 127);
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 162); // Idiomas
                $pdf->Write(0.2, "");
            }

            // Preview PDF
            $pdf->Output('I', "Curriculum-Generado.pdf");
        } elseif (count($cv->empresas) == 0) {

            //CV SIN EXPERIENCIA
            //REVISAR LAS POSICIONES

            $path = public_path("Pdf/CV-0_Experiencias.pdf");

            $pdf->setSourceFile($path);

            // import page 1
            $tplId = $pdf->importPage(1);


            // use the imported page and place it at point 10,10 with a width of 100 mm
            $pdf->useTemplate($tplId, null, null, null, 210, true);

            $pdf->SetXY(10, 10); // Nombre y apellido

            $empresas = $request->session()->get('empresas');
            $rasgos = $request->session()->get('rasgos');
            $lenguajes = $request->session()->get('lenguajes');


            if ($cv != null) {

                $pdf->Write(0.2, $cv->name . ' ' . $cv->surname);// Nombre y apellido

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(35, 25); // Telefono
                $pdf->Write(0.2, $cv->phone);

                $pdf->SetXY(35, 28); // Email
                $pdf->Write(0.2, $cv->email);

                $pdf->SetXY(35, 31); // Direccion
                $pdf->Write(0.2, $cv->adress);

                $pdf->SetXY(18, 48); // objetivo Profesional
                $pdf->Write(0.2, $cv->objetivo_profesional);

                $pdf->SetXY(18, 68); // Formacion Academica
                $pdf->Write(0.2, $cv->secundario . '-' . $cv->orientacion);

                $pdf->SetXY(18, 90); // Formacion Complementaria
                $pdf->Write(0.2, $cv->terciaria . ' - ' . $cv->orientacion_terciaria);

                $pdf->SetXY(18, 110); // Informatica
                foreach ($otros_estudios as $otro_estudio) {
                    $pdf->Write(0.2, $otro_estudio->nombre);
                    $pdf->SetXY(30, 110); // Informatica
                }

                $pdf->SetXY(18, 130); // Idiomas
                foreach ($lenguajes as $idioma) {
                    $pdf->Write(0.2, $idioma->nombre);
                    $pdf->SetXY(30, 130);
                }

                $pdf->SetXY(18, 148); // Otros datos de interes
                $pdf->Write(0.2, $cv->datos_interes);

            } else {
                $pdf->Write(0.2, "");

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(35, 25); // Telefono
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 28); // Email
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 31); // Direccion
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 48); // objetivo Profesional
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 65); // Formacion Academica
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 107); //Experiencias Laborales
                $pdf->Write(0.2, "");

                $pdf->SetXY(72, 112.5);
                $pdf->Write(0.2, "");

                $pdf->SetXY(35, 121);
                $pdf->Write(0.2, "");

                $pdf->SetXY(72, 127);
                $pdf->Write(0.2, "");

                $pdf->SetXY(18, 162); // Idiomas
                $pdf->Write(0.2, "");
            }

            // Preview PDF
            $pdf->Output('I', "Curriculum-Generado.pdf");
        }
    }
}
