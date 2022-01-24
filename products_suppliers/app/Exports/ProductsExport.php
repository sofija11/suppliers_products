<?php

namespace App\Exports;

use App\Models\Product;
use App\Providers\ProductService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{   
    //id suppliera za kog zelimo da exportujemo proizvode
    public $id = null;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["idProduct", "idSuplier", "idProduct", "priority", "part_number", "quantity", "price", "condition", "name", "idCategory"];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    { 
        $id = intval($this->id); //id suppliera za kog se traze proizvodi
        return ProductService::showAllProductsFromSupplier($id);
    }
}
