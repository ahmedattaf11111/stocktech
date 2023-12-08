<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Env;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;
    private $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env("MAIL_FROM_ADDRESS"), env("APP_NAME"))
            ->subject("Email Notification")
            ->markdown('email-notification', ["input" => $this->input]);
    }
}
