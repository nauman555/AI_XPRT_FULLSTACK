<?php

namespace Fullstack\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{

    use Sortable;

    protected $table = "customers";
    protected $primaryKey = 'customerNumber';
    public $timestamps = false;
    public $sortable = ['customerNumber', 'addressLine1', 'customerName', 'contactLastName', 'contactFirstName', 'phone', 'city', 'state', 'postalCode', 'country', 'creditLimit'];

}