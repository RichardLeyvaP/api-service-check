<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function pdf(Request $request){

        try {
            $data = $request->validate([
                'branchName' => 'max:100',
                'cityState' => 'max:100',
                'contact' => 'max:100',
                'numberRelatorie' => 'max:100',
                'tag' => 'max:50',
                'fabricante' => 'max:100',
                'direction' => 'max:200',
                'functionProceso' => 'max:200',
                'faixa' => 'max:50',
                'medida' => 'max:50',
                'fre' => 'max:50',
                'dataCalibration' => 'date',
                'dataNextCalibration' => 'date',
                'aplicada25' => 'numeric',
                'aplicada50' => 'numeric',
                'aplicada75' => 'numeric',
                'aplicada100' => 'numeric',
                'instrument_padrao' => 'max:100',
                'certificado' => 'max:100',
                'model' => 'max:50',
                'date_aferica' => 'date',
                'service_execute' => 'max:100',
                'art' => 'max:100',
                'ingenier' => 'max:100',
                'tecnico' => 'max:100',
                'data' => 'date'

            ]);
            Log::info("Generar PDF");
            $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true, 'chroot' => storage_path()])->setPaper('a4', 'patriot')->loadView('pdf', ['data' => $data]);
            $filename = 'reporte.pdf';
            //return $pdf->stream($filename, array('Attachment' => 0));
            return $pdf->stream($filename, array('Attachment' => 0));
        } catch (\Throwable $th) {
            Log::info($th);
        return response()->json(['msg' => $th->getMessage()], 500);
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
