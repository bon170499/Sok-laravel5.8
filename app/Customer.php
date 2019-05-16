<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "clothes_customer";
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
}
