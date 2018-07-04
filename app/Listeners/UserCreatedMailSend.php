<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\UserCreateEmail;

class UserCreatedMailSend
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
     * @param  UserCreatedEvent  $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        $user = $event->user;
        
       
        // array_walk_recursive($user, function ($item, $key) {
        //     echo "$key holds $item\n";
        // });
        foreach ($user as $row) {
          $mail=$row['email'];
          Mail::to($mail)->queue(new UserCreateEmail($user));
        }
    }
}
