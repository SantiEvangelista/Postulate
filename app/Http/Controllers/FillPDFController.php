<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
 
class FillPDFController extends Controller
{
    public function Addtopdf() {

        $pdf = new Fpdi();
           
       // add a page
       $pdf->AddPage();
       $pdf->SetFont('Arial','B',14);
   
       // set the source file
       
       $path = public_path("Pdf/curriculum-vitae-combinado.pdf");
   
       $pdf->setSourceFile($path);
   
       // import page 1
       $tplId = $pdf->importPage(1);
   
   
       // use the imported page and place it at point 10,10 with a width of 100 mm
       $pdf->useTemplate($tplId, null, null, null, 210, true);
   
       $pdf->SetXY(20, 10);
       $pdf->Write(0.2,"Santiago Evangelista");
   
   // Preview PDF
       $pdf->Output('I',"Curriculum-Generado.pdf");

   }
}