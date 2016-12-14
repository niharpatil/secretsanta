<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowAssignment extends Mailable
{
    use Queueable, SerializesModels;

    public $assigned_member_name;
    public $group_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($assigned_member_name,$group_name)
    {
        $this->assigned_member_name = $assigned_member_name;
        $this->group_name = $group_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.show_assignment')->with([
            'secret_santa_group_name' => $this->group_name,
            'assignment_name' => $this->assigned_member_name
        ]);
    }
}
