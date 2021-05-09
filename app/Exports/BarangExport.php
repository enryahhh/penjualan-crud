<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('barang.exports.barang-excel', [
            'barang' => Barang::all()
        ]);
    }
    // public function styles(Worksheet $sheet)
    // {
    //     // // $sheet->cell(2, function($row) { 
    //     // //     $row->setBackground('#CCCCCC'); 
    //     // // });
    //     // $sheet->getStyle('2')->setBackground('#CCCCCC'); 
    //     return [
    //         // Style the first row as bold text.
    //         2    => ['font' => ['bold' => true],'color'=>['']],
    //     ];
    // }
}
