<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductParameter extends Model
{
    protected $table = 'product_parameters';
    public $timestamps = false;
    protected $fillable = [
        'product_id', 'parameter_id', 'value',
    ];
}
