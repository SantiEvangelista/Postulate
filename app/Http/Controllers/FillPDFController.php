<?php
 
namespace App\Http\Controllers;

use App\Models\Generador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
 
class FillPDFController extends Controller
{
    public function Addtopdf(Generador $generador=null,Request $request) {

        $pdf = new Fpdi();
           
       // add a page
       $pdf->AddPage();
       $pdf->SetFont('Arial','B',14);
   
       // set the source file
       
       $path = public_path("Pdf/CV-2_Experiencias.pdf");
   
       $pdf->setSourceFile($path);
   
       // import page 1
       $tplId = $pdf->importPage(1);
   
   
       // use the imported page and place it at point 10,10 with a width of 100 mm
       $pdf->useTemplate($tplId, null, null, null, 210, true);

       $pdf->SetXY(10, 10); // Nombre y apellido
       $cv=$request->session()->get('cv');
       $empresas=$request->session()->get('empresas');
       $rasgos=$request->session()->get('rasgos');
       $lenguajes=$request->session()->get('lenguajes');

       
    if ($cv != null) {
        
        $pdf->Write(0.2,$cv->name.' '.$cv->surname);

        $pdf->SetFont('Arial','',8);
        $pdf->SetXY(35, 25); // Telefono
        $pdf->Write(0.2,$cv->phone);
        
        $pdf->SetXY(120, 10); // Nombre y apellido
        $pdf->Write(0.2,'imagen');

        $pdf->SetXY(35, 28); // Email
        $pdf->Write(0.2,$cv->email);
       
        $pdf->SetXY(35, 31); // Direccion
        $pdf->Write(0.2,$cv->adress);
        $pdf->SetXY(18, 48); // objetivo Profesional
        $pdf->Write(0.2,$cv->objetivo_profesional);

        $pdf->SetXY(18, 65); // Formacion Academica
        $pdf->Write(0.2,$cv->secundario.'-'.$cv->orientacion);

        if(count($cv->empresas)>1){
            $pdf->SetXY(35, 107); //Experiencias Laborales
            $pdf->Write(0.2,$cv->empresas[0]->start_date.'-'.$cv->empresas[0]->end_date.'  -  '.$cv->empresas[0]->company_name);
    
            $pdf->SetXY(72, 112.5);
            $pdf->Write(0.2,$cv->empresas[0]->charge);
    
            $pdf->SetXY(35, 121);
            $pdf->Write(0.2,$cv->empresas[1]->start_date.'-'.$cv->empresas[1]->end_date.'  -  '.$cv->empresas[1]->company_name);

            $pdf->SetXY(72, 127);
            $pdf->Write(0.2,$cv->empresas[1]->charge);
           }

        $pdf->SetXY(18, 162); // Idiomas
        
        foreach ($cv->lenguajes as $idioma) {
            $pdf->Write(0.2,$idioma->nombre);
            $pdf->SetXY(30, 162);
            }
        }

    else{
        $pdf->Write(0.2,"Matias Morales");

        $pdf->SetFont('Arial','',8);
        $pdf->SetXY(35, 25); // Telefono
        $pdf->Write(0.2,"03814234234");
        
        $pdf->SetXY(35, 28); // Email
        $pdf->Write(0.2,"m@gmail.com");
       
        $pdf->SetXY(35, 31); // Direccion
        $pdf->Write(0.2,"Tucuman");

        $pdf->SetXY(18, 48); // objetivo Profesional
        $pdf->Write(0.2,"objetivo profesional");

        $pdf->SetXY(18, 65); // Formacion Academica
        $pdf->Write(0.2,"Formacion academica");

        $pdf->SetXY(35, 107); //Experiencias Laborales
        $pdf->Write(0.2,"Fecha laboral 1  -  empresa");

        $pdf->SetXY(72, 112.5);
        $pdf->Write(0.2,"Area de Eperiencia 1");

        $pdf->SetXY(35, 121);
        $pdf->Write(0.2,"Fecha laboral 2  -  empresa");

        $pdf->SetXY(72, 127);
        $pdf->Write(0.2,"Area de Eperiencia 2");

        $pdf->SetXY(18, 162); // Idiomas
       $pdf->Write(0.2,"idioma");
       }

       
       
       $pdf->SetXY(18, 85); // Formacion Complementaria
       $pdf->Write(0.2,"Formacion complementaria");
       
       
       
       
       
       $pdf->SetXY(18, 143); // Informatica
       $pdf->Write(0.2,"Informatica");
       
       
       
       $pdf->SetXY(18, 180); // Otros datos de interes
       $pdf->Write(0.2,"Otros");

   // Preview PDF
       $pdf->Output('I',"Curriculum-Generado.pdf");

   }
}