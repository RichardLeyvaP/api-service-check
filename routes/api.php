<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::post('change-password', [UserController::class, 'change_password']);
});

Route::get('/send_email2', function(){
    return 'Esto para enviar email';
});

Route::get('/send_email', [ReporteController::class, 'send_email']);
Route::get('/pdf', [PdfController::class, 'pdf']);
Route::get('/pdf-prueba', [PdfController::class, 'pdf_prueba']);
Route::get('/pdf-apk', [PdfController::class, 'pdfApk']);//ruta para la apk
Route::get('/excel', [ExcelController::class, 'excel']);

Route::get('/reporte', [ReporteController::class, 'index']);
Route::get('/reporte-show', [ReporteController::class, 'show']);
Route::get('/reporte-show-user', [ReporteController::class, 'showByUser']);
Route::post('/reporte', [ReporteController::class, 'store']);
Route::post('/reporte-update', [ReporteController::class, 'update']);
Route::post('/reporte-delete', [ReporteController::class, 'destroy']);
Route::get('/reporte-get', [ReporteController::class, 'reporte_get']);
Route::get('/user-reports-cant', [ReporteController::class, 'user_reports_cant']);


Route::get('/reportes/{foldername}/{filename}', function ($foldername, $filename) {
    $path = storage_path("app/public/{$foldername}/{$filename}");

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = new Response($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->where(['folder' => 'pdfs', 'filename' => '.*']);
