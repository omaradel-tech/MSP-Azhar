<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    // protected $fillable=['product_id]




    public function products()
    {
        $this->belongsTo('App\Models\Product','product_id','id');
    }

}
