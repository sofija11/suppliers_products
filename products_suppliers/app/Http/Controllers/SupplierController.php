<?php

namespace App\Http\Controllers;

use App\Imports\SupplierImport;
use App\Providers\SupplierService;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller
{
    public function showAllSuppliers() {
        $suppliers = SupplierService::getAllSuppliers();
        var_dump($suppliers);
    }

    public function updateSupplierName(int $id, string $name) {
        SupplierService::updateSupplier($id, $name);
    }

    public function deleteSupplier(int $id) {
        $supplier = SupplierService::deleteSupplier($id);
        if ($supplier !== null) {
            var_dump('deleted');
        }
    }

    public function importSuppliers(){
        Excel::import(new SupplierImport, 'suppliers.csv');
        
        return redirect('/')->with('success', 'All good!');
    }
}
