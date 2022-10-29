<?php

namespace App;
use App\Cart;
use App\Stock; 
use App\Category; 
use App\Sale; 
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price','image','category_id'
    ];
    public function category(){
        return  $this->belongsTo(Category::class);
        }
        public function carts(){
            return $this->hasMany(Cart::class);
        }
        public function stocks(){
            return  $this->hasMany(Stock::class);
            } 
            public function sales(){
                return  $this->hasMany(Sale::class);
                } 
        
}
