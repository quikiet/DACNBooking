<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $messages;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $messages)
    {
        $this->name = $name;
        $this->messages = $messages;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Liên hệ từ QKJT HOTEL & RESORT')
            ->view('emails.user-notification')
            ->with([
                'name' => $this->name,
                'messages' => $this->messages,
            ]);
    }
}
