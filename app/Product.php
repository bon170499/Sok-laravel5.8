<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "clothes_product";
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    public function joinCategory()
    {
        return $this->belongsTo('App\Category', 'product_fk_id', 'category_id');
    }
}
