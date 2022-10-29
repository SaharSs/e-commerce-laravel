<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use App\Category;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->paginate(2);
        return view('admin.users.home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view("admin.users.create");
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
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
            'phone'=>'required',
            'adress'=>'required',
            'role'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
         ]);
         if($request->has("image"))
         {
         $image=$request->image;
         $newimage=time().'_'.$image->getClientOriginalName();
         $image->move(public_path("images/products/"),$newimage);
         }
        User::create([
            "firstName"=>$request->firstName,
            "lastName"=>$request->lastName,
            "email"=>$request->email,
             "password"=>\Hash::make($request->password),
            "phone"=>$request->phone,
            "adress"=>$request->adress,
            "role"=>$request->role,
            "image"=>$newimage,
        ]);
      

       
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
    public function edit(User $user )
    {
        
        return view('admin.users.edit',compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {   $request->validate([
      
        'role'=>'required',
            
        ]);
  
        $user->update($request->all());
  
        return redirect()->back();
                        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->back()
                        ->with('success','supervisor deleted successfully');
    }
  
    public function search(Request $request)
    {
    $q=request()->input('q');
    $users=User::where('firstName','LIKE',"%$q%")->paginate(2);
    
    return view('admin.users.home')->with('users',$users);
      
     }
}
