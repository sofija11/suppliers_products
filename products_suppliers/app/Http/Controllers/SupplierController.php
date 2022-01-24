<?php

namespace App\Http\Controllers;

use App\Providers\SupplierService;

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
}
