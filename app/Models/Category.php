<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','name'];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->products()->delete();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
