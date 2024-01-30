<?php
    namespace App\Services;

    use App\Repositories\ReporteRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

    class ReporteService
    {
        protected $reporteRepository;
    
        public function __construct(ReporteRepository $reporteRepository)
        {
            $this->reporteRepository = $reporteRepository;
        }
    
        public function getAllReportes()
        {
            return $this->reporteRepository->all();
        }
    
        public function getReporteById($id)
        {
            return $this->reporteRepository->find($id);
        }

        public function getByUser($user_id)
        {
            return $this->reporteRepository->findByUser($user_id);
        }
    
    
        public function createReporte(array $data)
        {
            return $this->reporteRepository->create($data);
        }
    
        public function updateReporte($id, array $data)
        {
            return $this->reporteRepository->update($id, $data);
        }
    
        public function deleteReporte($id)
        {
            return $this->reporteRepository->delete($id);
        }

        public function cantByUserReporte($data)
        {
            return $this->reporteRepository->cantByUser($data);
        }

        public function getReporte($id)
        {
            $reporte = $this->reporteRepository->find($id);
            Log::info("Generar PDF");
            $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true, 'chroot' => storage_path()])->setPaper('a4', 'patriot')->loadView('pdf', ['data' => $reporte]);
            $filename = 'reporte.pdf';
            return $pdf->stream($filename, array('Attachment' => 0));
        }
    }
?>