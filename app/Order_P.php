<?php
namespace App;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Order_P extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'product_title','lastName','firstName',
    'order_id','email', 'price','quantity','adress','total','phone' ]; 
    
    public function order()
    { 
        return $this->belongsTo(Order::class);
     } 
}
