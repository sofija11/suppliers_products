<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{
    public static $category_keys = [
        'Keyboard'         => 2,
        'Heatsink and Fan' => 3,
        'Fan Only'         => 4,
        'LCD Complete'     => 5,
        'Camera'           => 6,
        'Daughterboard'    => 7,
        'nema'             => null,
    ];

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'  => $row[4],
            'idCategory' => $row[8] === null ? null : strval($this->getCategoryid($row[8])),
            //moglo je i preko upita, kao sto sam uradila u SupplierProductImport
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }

    //dohvata id kategorije
    public static function getCategoryid(string $category):int {
        return self::$category_keys[$category];
    }
}
