@component('mail::message')

Reset Link

If you forgot your password, plzz click on the "Reset" button



@component('mail::button', ['url' => env('APP_URL').'/resetpass/'.Session::get('token')])
    RESET
@endcomponent
@endcomponent