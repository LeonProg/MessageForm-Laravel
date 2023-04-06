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
        return view('admin');
    }

    public function getMessage(Request $request)
    {
        $messages = MessageResource::collection(Message::sorted($request)->paginate(10));

        if ($request->has('perPage')) {
            $messages = MessageResource::collection(Message::sorted($request)->paginate($request->perPage));
        }

        return response()->json([
            'data' => $messages,
            'lastPage' => $messages->lastPage(),
            'nextPageUrl' => $messages->nextPageUrl(),
            'currentPage' => $messages->CurrentPage(),
        ]);
    }
}
