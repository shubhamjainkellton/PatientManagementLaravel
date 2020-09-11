<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){

        return view('login');
    } 
    public function validateUser(){

        return request()->validate([
            'email' =>['required','email'],  
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/']
        ]);
    }
    public function doLogin(Request $request)
    {   $this->validateUser();
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', '=', $email)->first();
        if (!$user)
        {
            return redirect('/login');
        }

        if (!Hash::check($password, $user->password)) 
        {
            
            return redirect('/login');
        }
        else
        {   
            $user = User::where('email', '=', $email)->first();
            $request->session()->put('user_id',$user->id );
            $request->session()->put('name', $user->name); 
            $request->session()->put('email',$user->email);
            $request->session()->put('role_id',$user->role_id);
            $role = $request->session()->get('role_id');

            switch($role)
            {
                case 1:
                    return redirect('/admindashboard');
                break;
                case 2:
                    $request->session()->put('department',$user->department);
                    return redirect('/doctordashboard');
                break;
                case 3:
                    return redirect('/staffdashboard');
                break;
                default:
                    return redirect('/login')->with('error', 'Credentials does not match!');

            }
                
        }
   }

   public function logout(Request $request){
    
    $logout = $request->session()->flush();
    // dd($logout);
    // Auth::logout();
    return redirect('/login')->with('success', 'Logged out succcessfully');

   }
}
