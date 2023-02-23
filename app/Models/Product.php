<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','desc','price'];



    public function order_items()
    {
        $this->hasOne(Order_item::class,'product_id','id');
    }
}
