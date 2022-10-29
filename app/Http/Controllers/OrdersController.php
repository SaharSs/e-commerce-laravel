<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users=User::all();
            $orders=Order::latest()->paginate(2);
            return view('admin.orders.home',compact('orders','users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return  view("admin.orders.create",compact('users'));
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
            'user_id'=>'required',
            'total'=>'required',
          
         ]);

         $order = new Order();
         $order->user_id= $request->user_id;
         $order->total= $request->total;
         $save = $order->save();

         if( $save ){
             return redirect()->back()->with('success','successfully ');
         }else{
             return redirect()->back()->with('fail','Something went Wrong, failed');
         }
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
    public function edit(Order $order)
    {   
        $users=User::all();
        return view('admin.orders.edit',compact('order','users')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order)
    {
      
        
        $request->validate([
            'user_id'=>'required',
            'total'=>'required',
          
         ]);
            $order->update($request->all());
      
            return redirect()->to('/admin/home');
                          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
  
        return redirect()->to('/admin/home');
    }
    public function search(Request $request)
    {
    $q=request()->input('q');
    $orders=Order::where('user_id','LIKE',"%$q%")->paginate(2);
    
    return view('admin.orders.home')->with('orders',$orders);
      
     }

}
