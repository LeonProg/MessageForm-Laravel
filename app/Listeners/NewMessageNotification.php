<?php

namespace App\Listeners;

use App\Mail\MessageMail;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewMessageNotification 
{
    /**
     * Handle the event.
     */
    public function handle(MessageSent $event) : void
    {
        Mail::to(Auth::user()->email)->send(new MessageMail($event->data));
    }
}
