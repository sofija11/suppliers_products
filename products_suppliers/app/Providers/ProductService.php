<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\SupplierProduct;
use Illuminate\Database\Eloquent\Collection;

class ProductService {

    /**
     * prikazuje sve proizvode
     */
    public static function getAllProducts() {
        $products = Product::all();
        return $products;
    }
    
    // updatuje proizvod
    public static function updateProduct(int $id) {
        // ovde bi se uzeli podaci za izmenu, iz request-a na primer, nakon popunjavanja forme
        $name = 'skoajsojda';

        $product = Product::find($id);
        if ($product !== null) {
            $product->name = $name;
            $product->save();
            var_dump('izmenjeno');
        } else {
            var_dump('product does not exists');
        }
    }
    /**
     * prikazuje sve proizvode odredjenog dobavljaca
     *
     * @param  int $supplier_id
     */
    public static function showAllProductsFromSupplier(int $supplier_id) {
        $products = SupplierProduct::where('idSuplier','=', $supplier_id)
        ->join('products','products.id', '=', 'supliers__products.idProduct')->get();
       // var_dump(json_encode($products));
        return $products;
    }

    /**
     * brise jedan proizvod
     */
    public static function deleteProduct($id) {
        $product = Product::find($id);
        if($product !== null) {
            $product->delete();
            return 'deleted';
        } else {
            var_dump('product does not exist');
        }
    }
}