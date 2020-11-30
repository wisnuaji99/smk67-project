<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{

    public function index() 
	{   

        return view('pdf_view');
    }

    function htmlToPDF(){
        //set_time_limit(300);
        $options = new Options();
        $options->setIsPhpEnabled(true);
        $options->setIsHtml5ParserEnabled(true);
        $options->setIsRemoteEnabled(true);
      
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml(view('pdf_view'));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }

}