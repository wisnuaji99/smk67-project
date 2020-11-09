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
        $options = new Options();
        $options->setIsPhpEnabled(true);
        $options->setIsHtml5ParserEnabled(true);
        $options->setIsRemoteEnabled(true);
      
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml(view('pdf_view'));
        $dompdf->setPaper(array(0,0,609.4488,935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }

}