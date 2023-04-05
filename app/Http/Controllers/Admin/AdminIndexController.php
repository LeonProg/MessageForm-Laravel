<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function index()
    {
        $messages = Message::query()->with('user')->paginate(10);

        return view('admin', [
            'message' => $messages,
        ]);
    }

    public function getMessage(Request $request)
    {
//        $messages = MessageResource::collection(Message::paginate(10));
        //        Реафакторинг
        $messages = Message::query()->with('user')->paginate(10);


        if ($request->has('perPage')) {
            $messages = Message::query()->with('user')->paginate($request->perPage);
        }

        if ($request->has('perPage') && $request->has('sortBy')) {
            $messages = Message::query()->with('user')->orderBy('created_at', $request->sortBy)->paginate($request->perPage);
        }

        return response()->json($messages);
    }
}
