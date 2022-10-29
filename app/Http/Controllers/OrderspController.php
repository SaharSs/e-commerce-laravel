<?php

namespace App\Http\Controllers;
use App\Order_P;
use App\Order;
use App\User;
use App\Product;
use Illuminate\Http\Request;

class OrderspController extends Controller
{
    public $timestamps = false; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ordersp=Order_P::orderby('product_title','desc')->paginate(2);
        return view('admin.ordersp.home',compact('ordersp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $orders=Order::all();
        $products=Product::all();
        return  view("admin.ordersp.create",compact('users','orders','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $request->validate([
            'product_title'=>'required',
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'adress'=>'required',
            'order_id'=>'required',
            'total'=>'required',
            'phone'=>'required',
            
          
         ]);

         $ordersp = new Order_P();
         $ordersp->product_title= $request->product_title;
         $ordersp->firstName= $request->firstName;
         $ordersp->lastName= $request->lastName;
         $ordersp->email= $request->email;
         $ordersp->price= $request->price;
         $ordersp->quantity= $request->quantity;
         $ordersp->adress= $request->adress;
         $ordersp->order_id= $request->order_id;
         $ordersp->total= $request->total;
         $ordersp->phone= $request->phone;
         

         $save = $ordersp->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_P $ordersp)
    {
        $products=Product::all();
        $orders=Order::all();
        return view('admin.ordersp.edit',compact('ordersp','products','orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order_P $ordersp)
    {  $request->validate([
        'product_title'=>'required',
        'firstName'=>'required',
        'lastName'=>'required',
         'email'=>'required',
         'price'=>'required',
         'quantity'=>'required',
         'adress'=>'required',
         'phone'=>'required',
         'order_id'=>'required',
         'total'=>'required',
      
     ]);
        $ordersp->update($request->all());
  
        return redirect()->to('/admin/home');
                      

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_P $ordersp)
    {
        $ordersp->delete();
  
        return redirect()->to('/admin/home');
    }
    public function search(Request $request)
    {
    $q=request()->input('q');
    $ordersp=Order_P::where('product_title','LIKE',"%$q%")->paginate(2);
    
    return view('admin.ordersp.home')->with('ordersp',$ordersp);
      
     }
}
