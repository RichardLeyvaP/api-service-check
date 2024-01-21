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
            /*$data = $request->validate([
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

            ]);*/
            $data = [
                    "branchName"=> "Produtos Boachá",
                    "cityState"=> "Ipaba/MG",
                    "numberRelatorie"=> "VSC-148-23-001",
                    "contact"=> "Vicente",
                    "tag"=> "PI-005",
                    "fabricante"=> "Casa Forte",
                    "direction"=> "Manômetro Analógico",
                    "functionProceso"=> "Pressão da Caldeira",
                    "faixa"=> "0 ~ 20,0 Kgf/cm²",
                    "medida"=> "Pressão",
                    "fre"=> "4349",
                    "dataCalibration"=> "2023-06-09",
                    "dataNextCalibration"=> "2023-06-09",
                    "aplicada25"=> "05.00",
                    "aplicada50"=> "10.00",
                    "aplicada75"=> "15.00",
                    "aplicada100"=> "20.00",
                    "instrument_padrao"=> "NS839055",
                    "certificado"=> "PR2220043",
                    "date_aferica"=> "2023-12-11",
                    "model"=> "MN01",
                    "service_execute"=> "Calibracao",
                    "art"=> "MG20232130753",
                    "ingenier"=> "LORENA DOS REIS FREITAS",
                    "tecnico"=> "Cledir Fernandes Salvaterra",
                    "data"=> "2023-06-09"
            ];
            Log::info($data);
            $filename = 'reporte.xlsx';
            //return Excel::download(new reporteExport($data), $filename);
            return Excel::download(new reporteExport($data), $filename);

        } catch (\Throwable $th) {
            Log::info($th);
        return response()->json(['msg' => $th->getMessage()], 500);
        }
    }
}
