<?php

namespace App\Http\Middleware;

// use Twilio;
use Closure;
use Auth;
use Mail;
use Illuminate\Http\Request;

class TwoFactorVerify
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->token_2fa_expiry > \Carbon\Carbon::now()){
            return $next($request);
        } 
        else
        {    
            $user->token_2fa = mt_rand(10000,99999);
            $user->save();        
        }
        // This is the twilio way
        // Twilio::message($user->phone_number, 'Two Factor Code: ' . $user->token_2fa);
        
        // send an email to the user here ..
        $params = [
            'user' => $user->token_2fa,
        ];
        
        Mail::send('emails.2fa', $params, function ($message) {
            $message->to("sanjam531@gmail.com","Sanjam");
            $message->subject('OTP');
        });
        
        // return redirect('/2fa');  
        return response()->json(['Response' => 'Mail Sent'], 200);
    }
}
