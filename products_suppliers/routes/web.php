<?php

use App\Exports\ProductsExport;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use Maatwebsite\Excel\Facades\Excel;

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

//supplier CRUD
Route::get('/suppliers',[SupplierController::class, 'showAllSuppliers']);
Route::get('/supplier/{id}/{name}', [SupplierController::class, 'updateSupplierName']);
Route::get('/supplier/{id}', [SupplierController::class, 'deleteSupplier']);

//product CRUD
Route::get('/products', [ProductController::class, 'showAllproducts']);
Route::get('/product/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/productsOfSupplier/{id}', [ProductController::class, 'showAllProductsForSupplier']);

//exportovanje po supplieru
Route::get('/export/{id}', [ProductController::class, 'generateCsv']);
