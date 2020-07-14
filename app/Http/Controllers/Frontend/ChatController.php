<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::all();
        return view('frontend.chat', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' =>  'bail|required|string',
        ]);

        $message = new Message();
        $message->user_id = Auth::user()->id;
        $message->message = $request->message;
        $message->save();
        return back();
    }
}
