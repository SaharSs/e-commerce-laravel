<?php

namespace App\Http\Controllers;
use App\Order;
use App\Order_P;
use PDF;


use Illuminate\Http\Request;

class OrdController extends Controller
{
    public function index()
    {
        if(session('success')) {
            toast(session('success','success'));
        } 
        $orders=Order::latest()->where('user_id',auth()->user()->id)->paginate(5);
        return view('web.order',compact('orders'));
    }
    public function invoice(Request $request)

    {
        $orders=Order::all()->where('id',$request->id);
        $orderss=Order_P::all()->where('order_id',$request->id);
        return view('web.invoice',compact('orders','orderss'));
    }
    public function downloadPdf(Request $request)

    {
         $orders=Order::all()->where('id',$request->id);
         $orderss=Order_P::all()->where('order_id',$request->id);
         $pdf=PDF::loadView('web.invoice',compact('orders','orderss'));
        return $pdf->download('order-l.pdf');
    }
    

}
