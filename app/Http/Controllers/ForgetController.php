<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\Resetlink;
use DB;
use Hash;
use App\User;

class ForgetController extends Controller
{
    public function show(){
        return view('forgotPassword');
    }

    
    public function sendPasswordResetToken(Request $request)
    {
        $user = User::where ('email', $request->email)->first();
        if ( !$user ) return redirect('/forgotPassword')->with('error', 'Email not found');

            //create a new token to be sent to the user. 
             DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random (30),
            'created_at' => now()
        ]);

        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        $token = $tokenData->token;  
        request()->validate(['email' => 'required|email']); 
        Mail::to(request('email'))->send(new Resetlink());
                
        return redirect('/forgotPassword')->with('message', 'Email Sent!');
    }
    
    
     public function showPasswordResetForm($token){
     $tokenData = DB::table('password_resets')
     ->where('token', $token)->first();

     if ( !$tokenData ) return redirect()->to('/'); //redirect them anywhere you want if the token does not exist.
     return view('/');
     }
    
    
    public function resetPassword(Request $request, $token){
     

     $password = $request->password;
     $tokenData = DB::table('password_resets')
     ->where('token', $token)->first();

     $user = User::where('email', $tokenData->email)->first();
     if ( !$user ) return redirect()->to('/'); //or wherever you want
        $user->password = validate($request, ['password' => ['required','min:6','confirmed']]);
     $user->password = Hash::make($password);
     $user->save();

    

    // If the user shouldn't reuse the token later, delete the token 
    DB::table('password_resets')->where('email', $user->email)->delete();

    //redirect where we want according to whether they are logged in or not.
    }
}
