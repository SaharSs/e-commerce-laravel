<?php

namespace App;
use App\User;
use App\Order_P;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'user_id','total' ]; 
    
    
    public function user()
    { 
        return $this->belongsTo(User::class);
     }
     
    public function order__p_s(){
        return $this->hasMany(Order_P::class);
      }
}
