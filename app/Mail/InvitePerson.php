<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitePerson extends Mailable
{
    use Queueable, SerializesModels;

    public $sender
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $sender)
    {
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('santa@mysecretsantacla.us')
                    ->view('emails.invite.inviteperson')
                    ->with([
                        'sender_name' => $this->sender->name 
                        ]);
    }
}
