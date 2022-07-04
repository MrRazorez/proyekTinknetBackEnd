<?php

namespace App\Exports;

use App\crudTinknet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class barangExport implements FromCollection, WithHeadings
{
    public function headings():array {
        return [
            "No",
            "Nama Perangkat",
            "Jenis",
            "Jumlah",
            "Status",
            "Kondisi",
            "Lokasi"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(crudTinknet::all());
    }
}
