<?php

namespace App\Http\Controllers\Front;
use App\product;
use App\Category;
use App\User;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   
    public function index(){
   
        $products=Product::all();
        $categories=Category::all();
        $users=User::all();
    return view('web.userpage',compact('categories','products','users'));
}
public function product(Request $request){
  
$product=Product::find($request->id);
return view('web.prod',compact('product'));
}

public function search(Request $request){
    $products=Product::orderBy('id','desc')->where('title','LIKE','%'.$request->product.'%');
    if($request->category != "ALL") $products->where('category_id',$request->category);
    $products= $products->get();
    $categories=Category::all();
  
    return view('web.userpage',compact('categories','products'));
}
}