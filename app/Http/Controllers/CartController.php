<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Str;
use App\Product;
use App\Cart;
use App\Stock;
use Helper;
use session;


use Illuminate\Http\Request;
class CartController extends Controller
{
public function cart(){
    $items = \Cart::session(auth()->id())->getContent();


    return view('web.cart', compact('items'));

//return  view("web.cart",compact('items'));
}   
public function addtocart(Request $request){
   
    $prod=Product::find($request->product_id);
    $product=Stock::where('product_id',request()->product_id)->first();
    
    

    
    $check=Cart::where('product_id',request()->product_id)->where('user_id',auth()->user()->id)->first();
if($check){
    Cart::where('product_id',request()->product_id)->where('user_id',auth()->user()->id);
    $check->quantity=request()->qte+$check->quantity;
    $check->amount = $product->price+$check->amount;
    if ($product->quantity < $check->quantity || $product->quantity == 0){
        request()->session()->flash('fail','La quantité entrée n’est pas disponible');
        return back();
    }
    $check->save();
    
    request()->session()->flash('success','avec succès');
    return redirect()->to('/web/cart');

}else{
    $cart = new Cart;
    $cart->user_id = auth()->user()->id;
    $cart->product_id =request()->product_id;
    $cart->s_id=$product->id;
    $cart->product_n = $prod->title;
    $cart->price = $prod->price;
    $cart->quantity = request()->qte;
    $cart->amount=$cart->price*$cart->quantity;
    if ($product->quantity < $cart->quantity || $product->quantity == 0) return back()->with('error','Stock not sufficient!.');
    $cart->save();
    request()->session()->flash('success','
    avec succès');
   return redirect()->to('/web/cart');
}
}
public function cartUpdate(Request $request){
    // dd($request->all());
   if($request->quant){
   
        $error = array();
        $success = '';
        // return $request->quant;
        foreach ($request->quant as $k=>$quant) {
            // return $k;
            $id = $request->qty_id[$k];
            // return $id;
            $cart = Cart::find($id);
         
          
            // return $cart;
            if($quant > 0 && $cart) {
                // return $quant;

                if($cart->stock->quantity < $quant){
                    request()->session()->flash('fail','La quantité entrée n’est pas disponible');
                    return redirect()->to('/web/cart');
                }
            
              if ($cart->stock->quantity >= $quant) { 
              $cart->quantity =$quant;
              $cart->amount = $cart->price*$cart->quantity;
             
              
        
            
            }  
              
              
              else{ 
                  
                $cart->quantity=$cart->stock->quantity;
               
               
               
              }
            
                // return $cart;
                
                if ($cart->stock->quantity ==0) continue;
                // return $cart->price;
            $save=$cart->save();
            $success = 'avec succès';
           
            }else{
                $error[] = '
                Panier invalide!';
            }
                      
        } 
        return back()->with($error)->with('success', $success);
    }else{
        return back()->with('
        Panier invalide!');
    }    
      
   

 
    }
    public function cartDelete(Request $request){
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success','Panier supprimé avec succès');
            return back();  
        }
        request()->session()->flash('error','Erreur veuillez réessayer');
        return back();       
    }    

    // add the product to cart
   /* public function add(Request $request,Product $product)
    {
        // add the product to cart
        \Cart::session(auth()->user()->id)->add(array(
            "id" => $product->id,
            "name" => $product->title,
            "price" => $product->price,
            "quantity" => $request->qty,
            "attributes" => array(),
            "associatedModel" => $product,
        ));
       


    return redirect()->back();

}*/


}