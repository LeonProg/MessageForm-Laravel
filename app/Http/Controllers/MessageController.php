<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function store(MessageRequest $request)
    {
        $validation = $request->validated();

        $validation['file_path'] = $request->file('file')->store('public/files');
        $validation['user_id'] = Auth::id();

        Message::query()->create($validation);

        return back();
    }
}
