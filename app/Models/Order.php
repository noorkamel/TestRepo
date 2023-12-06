<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','date','total'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'orders_products')->withPivot('quantity');
    }
























    public function  sum_products($products)
     {
        $total = 0 ;
        $ecah = 0 ;

         foreach ($products as $product )
        {
            $id = $product['id'];

            $q = $product['quantity'];

            $e = Product::find($id);

            $ecah = $e->price * $q ;

            $total = $total + $ecah ;
        }
        return $total;
     }
}
