<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\PhysicalStore;

class PhysicalImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $row)
        {
            PhysicalStore::create([
                "customer_name" => $row[1],
                "address" => $row[2],
                "phone" => $row[3],
                "product_id" => $row[4],
                "product_name"=> $row[5],
                "unit_price"=> $row[6],
                "quantity" => $row[7],
                "total_price" => $row[8],
                "date_sold" => $row[9],
                "payment_type" => $row[10],
                "status" => $row[11],
            ]);
        }
    }
}
