<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model {

    public $timestamps = false;
    
    protected $table = 'supliers__products';

    protected $fillable = [
        'idSuplier',
        'idProduct',
        'priority',
        'part_number',
        'quantity',
        'price',
        'condition',
    ];
}
