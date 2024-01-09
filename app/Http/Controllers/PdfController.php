<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function pdf(){

        try {

            Log::info("Generar PDF");
            $pdf = Pdf::setPaper('a4', 'patriot')->loadView('pdf');
            $filename = 'reporte.pdf';
            //return $pdf->stream($filename, array('Attachment' => 0));
            return $pdf->stream($filename, array('Attachment' => 0));
        } catch (\Throwable $th) {
            Log::info($th);
        return response()->json(['msg' => 'Error al generar el PDF'], 500);
        }
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
