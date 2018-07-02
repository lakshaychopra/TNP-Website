<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCreateEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    { 
        $params = [
            'user' => $this->user,
        ];
        return $this->markdown('emails.users.userCreated',$params)
        ->subject(trans('messages.email.userCreatedMailSendSubject'));
    }
}
