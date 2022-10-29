<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->paginate(2);
        return view('admin.categories.home',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view("admin.categories.create");
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
               'name'=>'required'
             
            ]);
  
            $category = new Category();
            $category->name = $request->name;
       
            $save = $category->save();
  
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
         $request->validate([
            'name'=>'required',
          
            ]);
      
            $category->update($request->all());
      
            return redirect()->route('admin.home')
                            ->with('success','category updated successfully');
        
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
  
        return redirect()->route('admin.home')
                        ->with('success','category deleted successfully');
    }


    public function search(Request $request)
    {
    $q=request()->input('q');
    $categories=Category::where('name','LIKE',"%$q%")->paginate(2);
    
    return view('admin.categories.home')->with('categories',$categories);
      
     }


}
