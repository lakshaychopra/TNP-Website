<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\User;


class TwoFactorEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The token instance.
     *
     * @var Token
     */
    protected $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $token)
    {
        $this->user = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.twofactor')
        ->with([
            'token_2fa' => $this->token->token_2fa,
        ]);
    }
}
