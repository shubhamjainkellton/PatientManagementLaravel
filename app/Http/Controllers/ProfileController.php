<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $email = session("email");
        $user = User::where('email', '=', $email)->get();
        
        return view('profile.index', ['user'=>$user]);

    }
    
    public function edit(User $user){
        
        return view('profile.edit',compact('user'));
    }

    public function update(Request $request, User $user){

        $current_password = $request->get('current_password');
         
        if(!Hash::check($current_password, $user->password))
        { 
           return back()->with('error', 'Your current password does not match with what you provided');
        }
        else
        {
            if(strcmp($current_password, $request->get('new_password')) == 0)
          {
            return back()->with('error', 'Your current password can not be same with the new password');
          }
        
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ]);
        
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone_no' => $request->get('phone_no'),
            'password' => Hash::make($request->get('new_password')),
        ]);
          
            dd($user->update());
        return redirect('/profile')->with('success', 'Profile updated successfully');  
            
        }
        
        
    } 
    
    public function validateUser(){

        return request()->validate([  
            'name' =>'required',  
            'email' =>['required','email'],  
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],  
            'address' =>'required',
            'phone_no' => ['required', 'digits:12', 'regex:/^(91)[6-9]{1}[0-9]{9}$/'], 
        ]);  

    }
}
