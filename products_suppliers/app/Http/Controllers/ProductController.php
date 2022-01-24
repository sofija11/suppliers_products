<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductImport;
use App\Imports\SupplierProductImport;
use App\Models\Supplier;
use App\Providers\ProductService;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    //prikazuje sve proizvode
    public function showAllproducts() {
        $products = ProductService::getAllProducts();
        var_dump(json_encode($products));
    }

    //brise proizvod po id-u
    public function deleteProduct(int $id) {
        $product = ProductService::deleteProduct($id);
        if ($product !== null) {
            var_dump('deleted');
        }
    }

    //svi proizvodi jednog dostavljaca
    public function showAllProductsForSupplier(int $supplier_id) {
        $productsOfSupplier = ProductService::showAllProductsFromSupplier($supplier_id);
        return $productsOfSupplier;
    }

    /**
     * generise csv za proizvode odredjenog dostavljaca po formatu suplier_datum
     */
    public function generateCsv($id){
        $supplier = Supplier::find($id);
        $supplier_name = $supplier->name;
        $date = now()->toDateString();
        $format_for_csv = $supplier_name . '_' . $date . '.csv';
        return Excel::download(new ProductsExport($id), $format_for_csv);
    }

    public function importProducts(){
        Excel::import(new ProductImport, 'suppliers.csv');
        
        return redirect('/')->with('success', 'All good!');
    }

    public function importSupplierProducts() {
        Excel::import(new SupplierProductImport, 'suppliers.csv');
        
        return redirect('/')->with('success', 'All good!');
    }
}
