<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [ 'product_id','quantity' ]; 
    public function product(){
        return  $this->belongsTo(Product::class);
        }
        public function carts(){
            return $this->hasMany(Cart::class);
        }
}
