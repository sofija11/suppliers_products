<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Maatwebsite\Excel\Concerns\ToModel;

class SupplierProductImport implements ToModel
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SupplierProduct([
            'idSuplier'     => $row[0] !== null &&  Supplier::where('name', '=', $row[0])->first() !== null ? Supplier::where('name', '=', $row[0])->first()->id : null,
            'idProduct'     => $row[4] !== null &&  Product::where('name', '=', $row[4])->first() !== null ? Product::where('name', '=', $row[4])->first()->id : null,
            'priority'      => intval($row[2]),
            'part_number'   => $row[3],
            'quantity'      => intval($row[5]),
            'price'         => floatval($row[6]),
            'condition'     => $row[7],
        ]);
    }
}
