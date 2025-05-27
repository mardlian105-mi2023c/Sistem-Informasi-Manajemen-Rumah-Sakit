<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $selectedUser = $request->query('user');
        $messages = [];

        if ($selectedUser) {
            $messages = Message::where(function ($query) use ($selectedUser) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $selectedUser);
            })->orWhere(function ($query) use ($selectedUser) {
                $query->where('sender_id', $selectedUser)
                      ->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();
        }

        return view('chat.index', compact('users', 'messages', 'selectedUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index', ['user' => $request->receiver_id]);
    }
}