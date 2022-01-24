<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {

    public $timestamps = false;

    protected $table = 'supliers';

    protected $fillable = [
        'name',
        'days_valid',
    ];

    protected $casts = [
        'name' => 'string',
        'days_valid' => 'integer',
    ];
}
