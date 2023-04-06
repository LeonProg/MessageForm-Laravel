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

        $message = Message::query()->create($validation);

        // event(new MessageSent($message));
        // Отправляет много сообщений из-за этого возиникают ошибки

        return back();
    }
}
