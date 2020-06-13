<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameters';
    public $timestamps = false;
    protected $fillable = [
        'name', 'category_id',
    ];
}
