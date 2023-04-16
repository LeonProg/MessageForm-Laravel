<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Mail\MessageMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function store(MessageRequest $request)
    {
        $validation = $request->validated();

        $validation['file_path'] = $request->file('file')->store('public/files');
        $validation['user_id'] = Auth::id();

        $lastMessage = Message::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->first();

        if ($lastMessage && $lastMessage->created_at->diffInDays(now()) < 1) {
            return redirect()->back()
                ->withErrors(["LimitExceeded" => __("exceptions.limit_exceeded")])
                ->withInput();
        }

        $message = Message::query()->create($validation);

        event(new MessageSent($message));

        return redirect()->back()->with(['success' => __("exceptions.message_send")]);
    }
}
