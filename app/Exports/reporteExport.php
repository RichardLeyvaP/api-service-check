<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class reporteExport implements FromView
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        return view('pdf', ['data' => $this->data]);
    }
}
