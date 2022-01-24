<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;

class SupplierImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        $supplier = Supplier::firstOrCreate(
            ['name' => $row[0]],
            ['days_valid' => intval($row[1])],
        );

        if (!$supplier->wasRecentlyCreated) {
            $supplier->update([
                'name' => $row[0],
                'days_valid' => intval($row[1]),
            ]);
        }
    }
}
