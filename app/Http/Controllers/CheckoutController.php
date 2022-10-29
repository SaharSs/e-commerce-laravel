<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Order;
use App\Order_P;
use App\Product;
use App\User;
use App\Stock;
use Illuminate\Http\Request;
use Helper;
class CheckoutController extends Controller
{
    public function checkout($amount){
        \Stripe\Stripe::setApiKey('sk_test_51JduPQAbIyBZO5A7JSbzPHz3HSQOswUwfJjLW2Ny2lmVSzbX59IypzxJrOewLdhkYyOHeOfgkh25PZI7Mv6N8npE00q3jrkB19');
        		
	
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

	return view('web.credit-card',compact('intent'));
     
           
    }

    public function afterPayment(Request $request)
    {
     
        //Helper::totalCartPrice()
      
     
       // Cart::where('product_id',$product->product_id);
          $order=Order::create([
                "user_id" => auth()->user()->id,
                "total" =>Helper::totalCartPrice(),
               
              
            ]);
            foreach(Helper::getAllProductFromCart() as $key=>$cart){
                $product=Stock::find($cart->s_id);
                $user=User::find($cart->user_id);
            Order_P::create([
                "order_id" =>$order->id,
                "lastName"=>auth()->user()->lastName,
                "firstName" =>auth()->user()->firstName,
                "email" =>auth()->user()->email,
                "product_title"=>$cart['product_n'],
                "quantity"=> $cart['quantity'],
                "price" => $cart['price'],
                "total" => $cart['amount'],
                "adress"=>auth()->user()->adress,
                "phone"=>auth()->user()->phone
              
            ]);
            $product->quantity=$product->quantity- $cart['quantity'];
            $product->save(); 
        
        }
 return redirect()->to('/web/order')->with('success','le paiement a été effectué, merci');
 
    }
}
