<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\Resetlink;
use DB;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\User;
use Session;

class forgotPassword extends Controller
{
    public function show()
    {
        return view('forgotPassword');
    }

    
    public function sendPasswordResetToken(Request $request)
    {
        $user = User::where ('email', $request->email)->first();
        if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        //create a new token to be sent to the user. 
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random (30),
            'created_at' => now()
        ]);

        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

       $token = $tokenData->token; 
       Session::put('token', $token);
       request()->validate(['email' => 'required|email']); 
       Mail::to(request('email'))->send(new Resetlink());
        
        return redirect('/forgotPassword')->with('message', 'Email Sent!');
    }
    
    
     public function showPasswordResetForm($token)
     {
         
         $tokenData = DB::table('password_resets')
         ->where('token', $token)->first();

         if ( $tokenData == null )
         {
             return redirect('/');
         }  //redirect them anywhere you want if the token does not exist.
         else
         {
             return view('/resetpass');
         }
     }
    
    
    public function resetPassword(Request $request, $token)
    {
     
         $password = $request->password;
         $tokenData = DB::table('password_resets')
         ->where('token', $token)->first();

         $user = User::where('email', $tokenData->email)->first();
         if ( !$user ) {return redirect()->to('/');} //or wherever you want

        //$this->validatepass();
         $user->password = Hash::make($password);
         $user->save();


        // If the user shouldn't reuse the token later, delete the token 
        DB::table('password_resets')->where('email', $user->email)->delete();

            return redirect('/');

        //redirect where we want according to whether they are logged in or not.
    }

    public function validatepass()
    {
        return request()->validate( ['password' => ['required','min:6','confirmed']]);
    }
}
