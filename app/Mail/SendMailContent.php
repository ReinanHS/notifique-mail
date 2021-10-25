<?php

namespace App\Mail;

use App\Models\Mail\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailContent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Mail $mail
     */
    protected $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mail->mail_from, $this->mail->userMailFrom->name)
            ->view('Mail.mail_iframe')->with('content', $this->mail->content);
    }
}
