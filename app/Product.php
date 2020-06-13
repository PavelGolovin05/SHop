<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'name', 'price', 'description', 'photo1', 'photo2', 'photo3', 'guarantee', 'amount',
        'category_id', 'company_id',
    ];
}
