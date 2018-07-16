<?php

namespace App\Listeners;

use App\Events\UserSingleCreateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\UserSingleCreateEmail;

class UserSingleCreateMailSend 
{
    use InteractsWithQueue;
    
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
    * @param  UserSingleCreateEvent  $event
    * @return void
    */
    public function handle(UserSingleCreateEvent $event)
    {
        $user = $event->user;
        Mail::to($user->email)->queue(new UserSingleCreateEmail($user));
    }
}
