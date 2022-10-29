<?php

namespace App\Http\Controllers;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.profile')->with([
            "users"=>auth()->user(),
            "categories"=>Category::all(),
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user=User::find(auth()->user()->id);
        return view('web.profile.edit',compact('user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
        $user=auth()->user();
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
             'phone'=>'required',
             'adress'=>'required', 
            'image'=>'image|mimes:png,jpg,jpeg',
            
                
            ]);
            if($request->has("image"))
            {
                $image_path=public_path("images/products/").$user->image;
                if(File::exists($image_path)){
                    unlink($image_path);
                }
            $image=$request->image;
            $newimage=time().'_'.$image->getClientOriginalName();
            $image->move(public_path("images/products/"),$newimage);
            $user->image=$newimage;
            }
       $user->update([
                "firstName"=>$request->firstName,
                "lastName"=>$request->lastName,
                "phone"=>$request->phone,
                 "adress"=>$request->adress,
                "image"=> $user->image,
            ]);
            return redirect()->to('/web/profile');
     
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
