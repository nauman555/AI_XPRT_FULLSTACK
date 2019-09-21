<?php

namespace Fullstack\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = 'orderNumber';
    public $timestamps = false;
}
