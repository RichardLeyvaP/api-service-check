<?php
    namespace App\Services;

    use App\Repositories\ReporteRepository;
    
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
            $this->reporteRepository->delete($id);
        }
    }
?>