<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$link)
    {
        $this->user = $user;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('panitia@kaasemnasunair.com', 'Panitia KAA 2020')
            ->subject('Reset Password')
            ->markdown('emails.reset')
            ->with([
                'user' => $this->user,
                'link' => $this->link
            ]);
    }
}
