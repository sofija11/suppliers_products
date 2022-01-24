<?php

namespace App\Http\Controllers;

use App\Providers\ProductService;

class ProductController extends Controller
{
    public function showAllproducts() {
        $products = ProductService::getAllProducts();
        var_dump(json_encode($products));
    }

    public function deleteProduct(int $id) {
        $product = ProductService::deleteProduct($id);
        if ($product !== null) {
            var_dump('deleted');
        }
    }

    public function showAllProductsForSupplier(int $supplier_id) {
        $productsOfSupplier = ProductService::showAllProductsFromSupplier($supplier_id);
        return $productsOfSupplier;
    }

    public function generateCsvForProductsFromSupplier(int $id) {
        $productsOfSupplier = ProductService::showAllProductsFromSupplier($id);
        
    }
}
