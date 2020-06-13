<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'product_id', 'product_amount', 'add_date'
    ];
}
