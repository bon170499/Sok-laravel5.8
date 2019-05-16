<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "clothes_order";
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    public function joinCustomer()
    {
        return $this->belongsTo('App\Customer', 'order_cus_id', 'customer_id');
    }
}
