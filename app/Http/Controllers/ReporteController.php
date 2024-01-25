<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Log;

class ReporteController extends Controller
{
    public function index()
    {
        try {
            return response()->json(['reportes' => Reporte::with('user')->get()], 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => "Error al mostrar los reportes"], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|numeric',
                //DADOS DO CLIENTE
                'branchName' => 'string',
                'cityState' => 'string',
                'contact' => 'string',
                //DADOS DO INSTRUMENTO
                'numberRelatorie' => 'string',
                'tag' => 'string',
                'fabricante' => 'string',
                'direction' => 'string',
                'functionProceso' => 'string',
                'faixa' => 'string',
                'medida' => 'string',
                'fre' => 'string',
                'dataCalibration' => 'date',
                'dataNextCalibration' => 'date',
                //AFERICÃO/CALIBRACÃO
                'aplicada25' => 'numeric',
                'aplicada50' => 'numeric',
                'aplicada75' => 'numeric',
                'aplicada100' => 'numeric',
                //PATRÕES UTILIZADOS
                'instrumentPadrao' => 'string',
                'certificado' => 'string',
                'model' => 'string',
                'dateAferica' => 'date',
                'serviceExecute' => 'string',
                'art' => 'string',
                'ingenier' => 'string',
                'tecnico' => 'string',
                'data' => 'date'

            ]);
            Log::info("Generar PDF");
            
            $reporte = new Reporte(); 
            if ($request->hasFile('image_logo')) {
                $reporte->data = $request->file('image_logo')->storeAs('logos',$reporte->id.'.'.$request->file('image_logo')->extension(),'public');
            }           

            $reporte->user_id = $data['user_id'];
            $reporte->branchName = $data['branchName'];
            $reporte->cityState = $data['cityState'];
            $reporte->contact = $data['contact'];
            $reporte->numberRelatorie = $data['numberRelatorie'];
            $reporte->tag = $data['tag'];
            $reporte->fabricante = $data['fabricante'];
            $reporte->direction = $data['direction'];
            $reporte->functionProceso = $data['functionProceso'];
            $reporte->faixa = $data['faixa'];
            $reporte->medida = $data['medida'];
            $reporte->fre = $data['fre'];
            $reporte->dataCalibration = $data['dataCalibration'];
            $reporte->dataNextCalibration = $data['dataNextCalibration'];
            $reporte->aplicada25 = $data['aplicada25'];
            $reporte->aplicada50 = $data['aplicada50'];
            $reporte->aplicada75 = $data['aplicada75'];
            $reporte->aplicada100 = $data['aplicada100'];
            $reporte->instrumentPadrao = $data['instrumentPadrao'];
            $reporte->certificado = $data['certificado'];
            $reporte->model = $data['model'];
            $reporte->dateAferica = $data['dateAferica'];
            $reporte->serviceExecute = $data['serviceExecute'];
            $reporte->art = $data['art'];
            $reporte->ingenier = $data['ingenier'];
            $reporte->tecnico = $data['tecnico'];
            $reporte->data = $data['data'];
            
            $reporte->save();

            return response()->json(['msg' => 'Reporte guardado correctamente'], 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['msg' =>  $th->getMessage().'Error al guardar el reporte'], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|numeric'
            ]);
            return response()->json(['reportes' => Reporte::where('user_id', $data['user_id'])->get()], 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => "Error al mostrar los reportes del usuario"], 500);
        }
    }

    public function get_reporte(Request $request){

        try {
            $data = $request->validate([
                'id' => 'required|numeric',
                'data' => 'date'

            ]);
            return $reporte = Reporte::where('data', $data['data'])->find($data['id']);
            Log::info("Generar PDF");
            $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true, 'chroot' => storage_path()])->setPaper('a4', 'patriot')->loadView('pdf', ['data' => $data]);
            $filename = 'reporte.pdf';
            //return $pdf->stream($filename, array('Attachment' => 0));
            return $pdf->stream($filename, array('Attachment' => 0));
        } catch (\Throwable $th) {
            Log::info($th);
        return response()->json(['msg' => $th->getMessage()], 500);
        }
    }
    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id' => 'required|numeric',
                'user_id' => 'required|numeric',
                //DADOS DO CLIENTE
                'branchName' => 'string',
                'cityState' => 'string',
                'contact' => 'string',
                //DADOS DO INSTRUMENTO
                'numberRelatorie' => 'string',
                'tag' => 'string',
                'fabricante' => 'string',
                'direction' => 'string',
                'functionProceso' => 'string',
                'faixa' => 'string',
                'medida' => 'string',
                'fre' => 'string',
                'dataCalibration' => 'date',
                'dataNextCalibration' => 'date',
                //AFERICÃO/CALIBRACÃO
                'aplicada25' => 'numeric',
                'aplicada50' => 'numeric',
                'aplicada75' => 'numeric',
                'aplicada100' => 'numeric',
                //PATRÕES UTILIZADOS
                'instrumentPadrao' => 'string',
                'certificado' => 'string',
                'model' => 'string',
                'dateAferica' => 'date',
                'serviceExecute' => 'string',
                'art' => 'string',
                'ingenier' => 'string',
                'tecnico' => 'string',
                'data' => 'date'

            ]);
            Log::info("Update PDF");
            
            $reporte = Reporte::find($data['id']); 
            if($request->hasFile('image_logo'))
            {
                if($reporte->image_logo)
                {
                    $destination=public_path("storage\\".$reporte->image_logo);
                    if (File::exists($destination)) {
                        File::delete($destination);
                    } 
                }                    
                $reporte->image_logo = $request->file('image_logo')->storeAs('logos',$reporte->id.'.'.$request->file('image_logo')->extension(),'public');
                
            }         

            $reporte->user_id = $data['user_id'];
            $reporte->branchName = $data['branchName'];
            $reporte->cityState = $data['cityState'];
            $reporte->contact = $data['contact'];
            $reporte->numberRelatorie = $data['numberRelatorie'];
            $reporte->tag = $data['tag'];
            $reporte->fabricante = $data['fabricante'];
            $reporte->direction = $data['direction'];
            $reporte->functionProceso = $data['functionProceso'];
            $reporte->faixa = $data['faixa'];
            $reporte->medida = $data['medida'];
            $reporte->fre = $data['fre'];
            $reporte->dataCalibration = $data['dataCalibration'];
            $reporte->dataNextCalibration = $data['dataNextCalibration'];
            $reporte->aplicada25 = $data['aplicada25'];
            $reporte->aplicada50 = $data['aplicada50'];
            $reporte->aplicada75 = $data['aplicada75'];
            $reporte->aplicada100 = $data['aplicada100'];
            $reporte->instrumentPadrao = $data['instrumentPadrao'];
            $reporte->certificado = $data['certificado'];
            $reporte->model = $data['model'];
            $reporte->dateAferica = $data['dateAferica'];
            $reporte->serviceExecute = $data['serviceExecute'];
            $reporte->art = $data['art'];
            $reporte->ingenier = $data['ingenier'];
            $reporte->tecnico = $data['tecnico'];
            $reporte->data = $data['data'];
            
            $reporte->save();

            return response()->json(['msg' => 'Reporte actualizado correctamente'], 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['msg' =>  $th->getMessage().'Error al actualizar el reporte'], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $data = $request->validate([
                'id' => 'required'
            ]); 
            $reporte = Reporte::find($data['id']);
            if ($reporte->image_logo) {
                $destination=public_path("storage\\".$reporte->image_logo);
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                }
                Reporte::destroy($data['id']);
            return response()->json(['msg' => 'Reporte eliminado correctamente'], 200);
        } catch (\Throwable $th) {
            Log::error($th);
        return response()->json(['msg' =>$th->getMessage().'Error al eliminar el reporte'], 500);
        }
    }
}
