<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
     /**
     * Generar Pdf
     * @OA\get (
     *     path="/api/pdf",
     *     tags={"Cliente"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="nombres",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="apellidos",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "nombres":"Aderson Felix",
     *                     "apellidos":"Jara Lazaro"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="CREATED",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombres", type="string", example="Aderson Felix"),
     *              @OA\Property(property="apellidos", type="string", example="Jara Lazaro"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The apellidos field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
     */
    public function pdf(Request $request){

        try {
            $data = $request->validate([
                //DADOS DO CLIENTE
                'branchName' => 'max:100',
                'cityState' => 'max:100',
                'contact' => 'max:100',
                //DADOS DO INSTRUMENTO
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
                //AFERICÃO/CALIBRACÃO
                'aplicada25' => 'numeric',
                'aplicada50' => 'numeric',
                'aplicada75' => 'numeric',
                'aplicada100' => 'numeric',
                //PATRÕES UTILIZADOS
                'instrumentPadrao' => 'max:100',
                'certificado' => 'max:100',
                'model' => 'max:50',
                'dateAferica' => 'date',
                'serviceExecute' => 'max:100',
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
    }
    public function pdfApk(Request $request){

        try {
            /*$data = $request->validate([
                //DADOS DO CLIENTE
                'branchName' => 'max:100',
                'cityState' => 'max:100',
                'contact' => 'max:100',
                //DADOS DO INSTRUMENTO
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
                //AFERICÃO/CALIBRACÃO
                'aplicada25' => 'numeric',
                'aplicada50' => 'numeric',
                'aplicada75' => 'numeric',
                'aplicada100' => 'numeric',
                //PATRÕES UTILIZADOS
                'instrumentPadrao' => 'max:100',
                'certificado' => 'max:100',
                'model' => 'max:50',
                'dateAferica' => 'date',
                'serviceExecute' => 'max:100',
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
                "instrumentPadrao"=> "NS839055",
                "certificado"=> "PR2220043",
                "dateAferica"=> "2023-12-11",
                "model"=> "MN01",
                "serviceExecute"=> "Calibracao",
                "art"=> "MG20232130753",
                "ingenier"=> "LORENA DOS REIS FREITAS",
                "tecnico"=> "Cledir Fernandes Salvaterra",
                "data"=> "2023-06-09",
                "image_logo"=> ""
        ];
            Log::info("Generar PDF");
            $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true, 'chroot' => storage_path()])->setPaper('a4', 'patriot')->loadView('pdf', ['data' => $data]);
            $filename = 'reporte.pdf';
            // Obtiene el contenido del PDF como una cadena
    $pdfContent = $pdf->output();

    // Calcula el tamaño del PDF en kilobytes
    $pdfSizeKB = strlen($pdfContent) / 1024;
        Log::info($pdfSizeKB);
    // Guarda el PDF en el almacenamiento
    $filename = 'reporte.pdf';
    Storage::put('public/pdfs/'.$filename, $pdfContent);

    $path = storage_path("app/public/pdfs/".$filename);

    if (!File::exists($path)) {
        abort(404);
    }

    // Lee el archivo del almacenamiento
    $file = File::get($path);
    $type = File::mimeType($path);

    // Devuelve el PDF para descargar con el tamaño en el encabezado
    $response = new Response($file, 200);
    $response->header("Content-Type", $type);
    $response->header("Content-Length", $pdfSizeKB);

    return $response;
        } catch (\Throwable $th) {
            Log::info($th);
        return response()->json(['msg' => $th->getMessage()], 500);
        }
    }

    public function pdf_prueba(Request $request){

        try {
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
                "instrumentPadrao"=> "NS839055",
                "certificado"=> "PR2220043",
                "dateAferica"=> "2023-12-11",
                "model"=> "MN01",
                "serviceExecute"=> "Calibracao",
                "art"=> "MG20232130753",
                "ingenier"=> "LORENA DOS REIS FREITAS",
                "tecnico"=> "Cledir Fernandes Salvaterra",
                "data"=> "2023-06-09"
        ];
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
}
