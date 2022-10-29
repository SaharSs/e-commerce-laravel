<?php

namespace App;
use Auth;
use App\Product;
use App\Stock;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'product_id','s_id','product_n', 'price','amount','quantity'
    ];
  
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class,'s_id');
    }
}