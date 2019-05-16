<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "clothes_album";
    protected $primaryKey = 'album_id';
    public $timestamps = false;
}
