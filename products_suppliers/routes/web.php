<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/suppliers',[SupplierController::class, 'showAllSuppliers']);
Route::get('/supplier/{id}/{name}', [SupplierController::class, 'updateSupplierName']);
Route::get('/supplier/{id}', [SupplierController::class, 'deleteSupplier']);

Route::get('/products', [ProductController::class, 'showAllproducts']);
Route::get('/product/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/productsOfSupplier/{id}', [ProductController::class, 'showAllProductsForSupplier']);

Route::get('/csv/{id}', [ProductController::class, 'generateCsvForProductsFromSupplier']);