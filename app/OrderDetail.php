<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "clothes_order_detail";
    protected $primaryKey = 'detail_id';
    public $timestamps = false;
    public function joinOrder()
    {
        return $this->belongsTo('App\Order', 'detail_or_id', 'order_id');
    }

}
