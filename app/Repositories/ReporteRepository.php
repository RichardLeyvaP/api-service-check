<?PHP
    namespace App\Repositories;

    use App\Models\Reporte;
use Illuminate\Support\Facades\Log;

    class ReporteRepository{

    public function all()
    {
        return Reporte::with('user')->get();
    }

    public function find($id)
    {
        return Reporte::find($id);
    }

    public function findByUser($user_id)
    {
        //return User::find($user_id)->reportes()->get();
        return Reporte::where('user_id', $user_id)->get();
    }

    public function create(array $data)
    {
        return Reporte::create($data);
    }

    public function update($id, array $data)
    {
        $reporte = $this->find($id);
        $reporte->update($data);
        return $reporte;
    }

    public function delete($id)
    {
        $item = $this->find($id);
        $item->delete();
    }

    Public function cantByUser(array $data)
    {
        if ($data['start_date'] && $data['end_date']) {
            Log::info('no son nulas');
            $reportes = Reporte::where('user_id', $data['user_id'])->whereBetween('data', [$data['start_date'], $data['end_date']])->get();
        }
        else{
        $reportes = Reporte::where('user_id', $data['user_id'])->get();
        }
        return $result = [
            'cant' => $reportes->count(),
            'reports' => $reportes
          ];
    }
    }
?>