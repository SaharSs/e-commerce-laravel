<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use DB;
class StockController extends Controller
{
    public function index()
    {
        $products=Product::all();
        $stocks=Stock::latest()->paginate(3);
        return view('admin.stocks.home',compact('stocks','products'));
    }
    public function create()
    {
        $stocks=Stock::all();
        $products=Product::all();
        return  view("admin.stocks.create",compact('products','stocks'));
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
            'product_id'=>'required',
            'quantity'=>'required',
          
         ]);
         $ch=Stock::find(request()->product_id-1);
if($ch){
    $ch->quantity=request()->quantity+$ch->quantity;
    $ch->save();
    
    request()->session()->flash('success','avec succès');
    return redirect()->to('/admin/home');
}else{
         $stock = new Stock();
         $stock->product_id= $request->product_id;
         $stock->quantity= $request->quantity;
         $save = $stock->save();

         if( $save ){
             return redirect()->back()->with('success','successfully ');
         }else{
             return redirect()->back()->with('fail','Something went Wrong, failed');
         }
    }
    }
    public function stockUpdate(Request $request){
      
        foreach($request->stock as $key=>$name){
          
                $stock=Stock::find($request->stock[$key]);
         
              $stock->quantity=$stock->quantity+$request->quant[$key];
              $stock->save();         
            
           }
           return redirect()->to('/admin/home');
                // return $request->quant;
       
                    // return $id;
                
                      
      
              
           
        
    
            
                }
                public function delete(Request $request){
                    $stock= Stock::find($request->id);
                    if ($stock) {
                        $stock->delete();
                        request()->session()->flash('success','Panier supprimé avec succès');
                        return back();  
                    }
                    request()->session()->flash('error','Erreur veuillez réessayer');
                    return back();       
                }    
              
            }

