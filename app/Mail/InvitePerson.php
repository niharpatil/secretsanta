<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User as User;

class InvitePerson extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $group_name;
    public $member;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_name, $group_name, $member)
    {
        $this->sender_name = $sender_name;
        $this->group_name = $group_name;
        $this->member = $member;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invite.inviteperson')
                    ->with([
                        'sender_name' => $this->sender_name,
                        'group_name' => $this->group_name,
                        'code' => $this->member->confirmation,
                        ]);
    }
}
