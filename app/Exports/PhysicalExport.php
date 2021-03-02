<?php

namespace App\Exports;

use App\PhysicalStore;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhysicalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PhysicalStore::all();
    }
}
