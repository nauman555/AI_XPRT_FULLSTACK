<?php

namespace Fullstack\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    // protected $primaryKey = 'productCode';
    public $timestamps = false;
}