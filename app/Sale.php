<?php

namespace App;
use App\user;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [ 'user_id','product_id','qte','price',
    'total','status' ]; 
    
    public function user()
    { 
        return $this->belongsTo(User::class);
     }
     public function product()
     { 
         return $this->belongsTo(Product::class);
      }  
}
