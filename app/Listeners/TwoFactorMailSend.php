<?php

namespace App\Listeners;

use App\Events\TwoFactorEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\TwoFactorEmail;

class TwoFactorMailSend 
{
    /**
    * Create the event listener.
    *
    * @return void
    */ 
    public function __construct()
    {
        //
    }
    
    /**
    * Handle the event.
    *
    * @param  TwoFactorEvent  $event
    * @return void
    */
    public function handle(TwoFactorEvent $event)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $user = $event->user;
        Mail::to($user->email)->queue(new TwoFactorEmail($user));
    }
}