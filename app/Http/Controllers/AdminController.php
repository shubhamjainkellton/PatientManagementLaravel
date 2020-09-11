<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{   
    
    public function create(){
        
        return view('admin.create');
    }
    public function store()  
   
    {  
        $this->validateUser();
  
        $users = new User;  
        $users->name     = request()->get('name');  
        $users->email    = request()->get('email');  
        $users->password = Hash::make(request()->get('password'));  
        $users->address  = request()->get('address'); 
        $users->phone_no = request()->get('phone_no');
        $users->role_id   =  request()->input('role_id', 1);
        $users->save();  

        return redirect('/admin');
    } 
    public function index(){

        $users = DB::table('users')->latest()->paginate(20);
        return view('admin.index', ['admins'=>$users]);

    }
    public function edit(User $user){
        
        return view('admin.edit',compact('user'));
    }

    public function update(User $user){
        
        $user->update($this->validateUser());
        $users->password = Hash::make(request()->get('password'));
        $users->save();

        return redirect('/admin', $user); 
    }

    public function destroy(User $user)  
    {  
        $user=User::find($user);  
        $user->delete(); 
        return redirect('/admin'); 
    }  


    public function validateUser(){

        return request()->validate([  
            'name' =>'required',  
            'email' =>['required','email'],  
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],  
            'address' =>'required',
            'phone_no' => ['required', 'digits:12', 'regex:/^(91)[6-9]{1}[0-9]{9}$/'],
            'role_id'  => 'required' 
             
        ]);  

    }

    

}
