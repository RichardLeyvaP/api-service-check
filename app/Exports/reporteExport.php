<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class reporteExport implements FromView, ShouldAutoSize
{
    use Exportable;
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        return view('pdf', ['data' => $this->data]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
                $event->sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
                //$event->sheet->getPageSetup()->setMargins(1, 1, 1, 1);
                $drawing = new Drawing();
                $drawing->setPath(public_path('logos//prueba.png'));
                $drawing->setCoordinates('A1');
                $drawing->setWorksheet($event->sheet->getDelegate());
                $drawing->setWidth(50);
                $drawing->setHeight(50);
                
                //$event->sheet->getDelegate()->addDrawing($drawing);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(50);
                $event->sheet->getDelegate()->getPageSetup()->setFitToWidth(1);
            },
        ];
    }

}
