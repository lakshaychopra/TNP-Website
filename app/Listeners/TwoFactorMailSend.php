<?php

namespace App\Listeners;

use App\Events\TwoFactorEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

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
        $user = $event->user;
        Mail::queue('emails.2fa', $params, function ($message) use($user) {
            $message->to($user->email, $user->name);
            $message->subject('OTP');
        });
        return response()->json(['Response' => 'Mail Sent'], 200);
    }
}
