<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class PdfController extends Controller
{

    public function index() 
	{
        return view('pdf_view');
    }

    function htmlToPDF(){
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pdf_view'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

}