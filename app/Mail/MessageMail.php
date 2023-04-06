<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $theme;
    public $text;
    public $file_url;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->theme = $data->theme;
        $this->text = $data->text;
        $this->file_url = $data->file_url;
    }

    public function build()
    {
        return $this->markdown('emails.message');
    }

}
