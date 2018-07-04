<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class UserCreateEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($user)
    {
        $this->user = $user;
        \Log::info($user);
    }
    
    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {  
        // foreach ($user as $row) {
        //     $username=$row['username'];
        //     $email=$row['email'];
        //     $phone_number=$row['phone_number'];
        // }
        
        $params = [
            // 'username' => $username,
            // 'email' => $email,
            // 'phone_number' => $phone_number
        ];
        
        return $this->markdown('emails.users.userCreated',$params)
        ->subject(trans('messages.email.userCreatedMailSendSubject'));
    }
}
