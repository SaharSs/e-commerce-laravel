<?php
namespace App\Helpers;
use App\Cart;
use App\Product;
 use Auth;
class Helper{
   
    public static function getAllProductFromCart($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::with('product')->where('user_id',$user_id)->get();
        };
  
}
public static function totalCartPrice($user_id=''){
    if(Auth::check()){
        if($user_id=="") $user_id=auth()->user()->id;
        return Cart::where('user_id',$user_id)->sum('amount');
    }
    else{
        return 0;
    }
}
}
?>