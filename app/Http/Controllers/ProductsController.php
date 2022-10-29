<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.products.home')->with([
            "products"=>Product::latest()->paginate(2),
            "categories"=>Category::has('products')->get(),
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view("employee.products.create")->with([
            "categories"=>Category::all() 
        ]);
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
            'title'=>'required',
            'description'=>'required',
             'price'=>'required',
           
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'category_id'=>'required'
                
            ]);
            if($request->has("image"))
            {
            $image=$request->image;
            $newimage=time().'_'.$image->getClientOriginalName();
            $image->move(public_path("images/products/"),$newimage);
            }
            Product::create([
                "title"=>$request->title,
                "description"=>$request->description,
                "price"=>$request->price,
               
                "category_id"=>$request->category_id,
                "image"=>$newimage,
            ]);
            return redirect()->back();
            
      
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
    public function edit(Product $product)
    {
        return view('employee.products.edit')->with([
            "product"=>$product,
            "categories"=>Category::all(),
            
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Product $product)
    {       $request->validate([
        'title'=>'required',
        'description'=>'required',
         'price'=>'required',
        
        'image'=>'image|mimes:png,jpg,jpeg',
        'category_id'=>'required'
            
        ]);
        if($request->has("image"))
        {
            $image_path=public_path("images/products/").$product->image;
            if(File::exists($image_path)){
                unlink($image_path);
            }
        $image=$request->image;
        $newimage=time().'_'.$image->getClientOriginalName();
        $image->move(public_path("images/products/"),$newimage);
        $product->image=$newimage;
        }
        $product->update([
            "title"=>$request->title,
            "description"=>$request->description,
            "price"=>$request->price,
      
            "category_id"=>$request->category_id,
            "image"=> $product->image,
        ]);
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $product)
    {
        $image_path=public_path("images/products/").$product->image;
        if(File::exists($image_path)){
            unlink($image_path);
        }
 
    $product->delete();
    return redirect()->back();        //
    }
    public function search(Request $request)
    {
    $q=request()->input('q');
    $products=Product::where('title','LIKE',"%$q%")->paginate(2);
    
    return view('employee.products.home')->with('products',$products);
      
     }

}
