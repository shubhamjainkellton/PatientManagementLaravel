<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{   
    
    public function create(){
        return view('doctor.create');
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
        $users->department = request()->get('department');
        $users->time_from    = request()->get('time_from');  
        $users->time_to = request()->get('time_to');  
        $users->consultancy_fee  = request()->get('consultancy_fee'); 
        $users->consultancy_days = request()->get('consultancy_days');
        $users->role_id   =  request()->input('role_id', 2);
        $users->save();  

        return redirect('/doctor')->with('success', 'Doctor created successfully');
    } 
    public function index(){
        
        $users = DB::table('users')->latest()->paginate(20);
        return view('doctor.index', ['users'=>$users])->with('i', ((request()->input('page', 1) - 1) * 20));

    }
    public function edit(User $user){
       
        return view('doctor.edit',compact('user'));
    }

    public function update(User $user){

        $user->update([
            'name' => request()->get('name'),  
            'email' => request()->get('email'),  
            'address'  => request()->get('address'),
            'phone_no' => request()->get('phone_no'),
            'department' =>  request()->get('department'),
            'time_from' => request()->get('time_from'),  
            'time_to' => request()->get('time_to'),  
            'consultancy_fee'  => request()->get('consultancy_fee'),
            'consultancy_days' => request()->get('consultancy_days'),
            'role_id' => request()->input('role_id',2),
        ]);
       
        return redirect('/doctor')->with('success', 'Doctor updated successfully');; 
    }

    public function destroy(User $user)  
    {  
        $user=User::find($user);  
        $user->each->delete(); 
        return redirect('/doctor')->with('success', 'Doctor deleted successfully');; 
    } 
    public function search(Request $request){

        $search = $request->get('search');
        $user =User::where('name','like','%'.$search.'%')->latest()->paginate(20);
        return view('doctor.index',['users'=>$user])->with('i', ((request()->input('page', 1) - 1) * 20));
    } 


    public function validateUser(){

        return request()->validate([  
            'name' =>'required',  
            'email' =>['required','email'],  
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],  
            'address' =>'required',
            'department' =>'required',
            'phone_no' => ['required', 'digits:12', 'regex:/^(91)[6-9]{1}[0-9]{9}$/'],
            'time_from' => ['required'],
            'time_to' => ['required'],
            'consultancy_fee' => ['required'],
            'consultancy_days' => ['required'], 
            'role_id'    => 'required'
             
        ]);  

    }

}
