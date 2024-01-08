<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function pdf(){

        $pdf = Pdf::setPaper('a4', 'landscape')->loadView('template_pdf');
        $filename = 'reporte.pdf';
        return $pdf->stream($filename, array('Attachment' => 0));
        /*$html = View::make('template_pdf')->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('orientation', 'portrait', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html)->setPaper('a4', 'landscape');
        $dompdf->render();

        $filename = 'reporte.pdf';

        return $dompdf->stream($filename, array('Attachment' => 0));*/
    }
}
