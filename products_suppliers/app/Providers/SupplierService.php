<?php

namespace App\Providers;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Supplier;
class SupplierService {

    /**
     * dohvata sve dostavljace
     */
    public static function getAllSuppliers(): Collection {
       $suppliers = Supplier::all();
       return $suppliers;
    }

    /**
     * izmena dobavljaca
     */
    public static function updateSupplier($id, $name) {
       $supplier = Supplier::find($id);
       if ($supplier !== null) {
            $timestamp = now();
            //$supplier->name = 'izmena'.now()->timestamp;
            $supplier->name = $name;
            $supplier->save();
            var_dump($supplier);
            var_dump("SUCESSFUL UPDATE");
       } else {
           var_dump('that supplier does not exist');
       }
   
    }

    public static function deleteSupplier($id) {
        $supplier = Supplier::find($id);
        if($supplier !== null) {
            $supplier->delete();
            return 'deleted';
        } else {
            var_dump('supplier does not exist');
        }
    }
}