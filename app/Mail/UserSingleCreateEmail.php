<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class UserSingleCreateEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($user)
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
        
        return $this->markdown('emails.users.userSingleCreated',$params)
        ->subject(trans('messages.email.userCreatedMailSendSubject'));
    }
}
