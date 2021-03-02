<?php

namespace App\Exports;

use App\PhysicalStore;
use Maatwebsite\Excel\Concerns\FromQuery;
//use Maatwebsite\Excel\Concerns\WithHeadings;

class PhysicalExportSold implements FromQuery //, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return PhysicalStore::query()->whereMonth('date_sold',date('m'))->where('status','sold');
    }
    /*public function headings():array
    {
        return ["id", "Customer Name", "Address","Phone","Product Id","Product Name","Unit Price","Quantity","Total Price", "Date Sold", "Payment Type", "Status"];
    }*/
}