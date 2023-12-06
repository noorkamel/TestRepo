<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{


    use HasFactory;
    protected $fillable = [

        'order_product_id',
        'order_id',
        'product_id',
        'quantity'
    ];

    public function products()
    {
      return $this->hasMany(Product::class);
    }
    public function orders()
    {
      return $this->hasMany(Order::class);
    }
}
