<?php

namespace App\Http\Controllers;

use App\Exports\reporteExport;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index(){
        return view('export');
    }

    public function excel(Request $request){

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
            Log::info($data);
            $filename = 'reporte.xlsx';
            //return Excel::download(new reporteExport($data), $filename);
            return Excel::download(new reporteExport($data), 'invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

        } catch (\Throwable $th) {
            Log::info($th);
        return response()->json(['msg' => $th->getMessage()], 500);
        }
    }
}
