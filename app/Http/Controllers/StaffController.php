<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{   
    
    public function create(){
        return view('staff.create');
    }
    public function store()  
   
    {  
        $this->validateStaff();
  
        $staffs = new User;  
        $staffs->name     = request()->get('name');  
        $staffs->email    = request()->get('email');  
        $staffs->password = Hash::make(request()->get('password'));  
        $staffs->address  = request()->get('address'); 
        $staffs->phone_no = request()->get('phone_no');
        $staffs->role_id   = request()->input('role_id',3);
        $staffs->save();  

        return redirect('/staff')->with('success', 'Staff created successfully');
    } 
    public function index(){
        
        $staffs = DB::table('users')->latest()->paginate(20);
        return view('staff.index', ['staffs'=>$staffs])->with('i', ((request()->input('page', 1) - 1) * 20));
        
    }
    public function edit(User $staff){
        
        return view('staff.edit',compact('staff'));
    }

    public function update(User $staff)
    { 
        $staff->update([
            'name' => request()->get('name'),  
            'email' => request()->get('email'),  
            'address'  => request()->get('address'),
            'phone_no' => request()->get('phone_no'),
            'role_id' => request()->input('role_id',3),
        ]);
        
        return redirect('/staff')->with('success', 'Staff updated successfully'); 
    }

    public function destroy(User $staff)  
    {  
        $staff=User::find($staff);  
        $staff->each->delete(); 
        return redirect('/staff')->with('success', 'Staff deleted successfully'); 
    }  
    public function search(Request $request){

        $search = $request->get('search');
        $staff = User::where('name','like','%'.$search.'%')->latest()->paginate(20);
        return view('staff.index',['staffs'=>$staff])->with('i', ((request()->input('page', 1) - 1) * 20));
    }

    public function validateStaff(){

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


