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
     *                          property="nombresaaa",
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
    }
    public function pdfApk(Request $request){

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
            Storage::put('public/pdfs/'.$filename, $pdf->output());
            $path = storage_path("app/public/pdfs/".$filename);

                if (!File::exists($path)) {
                    abort(404);
                }

                $file = File::get($path);
                $type = File::mimeType($path);

                $response = new Response($file, 200);
                $response->header("Content-Type", $type);

                return $response;
            //$pdf->save(storage_path('app/public/pdf'.$filename));
            //$filename =$request->file('image_url')->storeAs('professionals',$request->file('image_url')->getClientOriginalName(),'public');
            //return $pdf->stream($filename, array('Attachment' => 0));
            //return Storage::url('pdfs/'.$filename);
        } catch (\Throwable $th) {
            Log::info($th);
        return response()->json(['msg' => $th->getMessage()], 500);
        }
    }
}
