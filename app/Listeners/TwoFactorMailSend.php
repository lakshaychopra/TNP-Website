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
        $token = $event->user;
       
        // $params = [
        //     'user' => $token,
        // ];
        
        // Mail::send('emails.2fa', $params, function ($message) use($token) {
        //     $message->to($token->email, $token->name);
        //     $message->subject('OTP');
      
        Mail::to($token->email)->send(new TwoFactorEmail);
    }
}
