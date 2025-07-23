<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User; // Import User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade

class MessageController extends Controller
{
    /**
     * Display the user's message inbox.
     */
    public function index()
    {
        $userId = Auth::id();

        // Get the most recent message for each conversation
        $latestMessages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(function ($item) use ($userId) {
                // Group by the other person in the conversation
                return $item->sender_id == $userId ? $item->receiver_id : $item->sender_id;
            });

        return view('messages.index', ['conversations' => $latestMessages]);
    }

    /**
     * Store a newly created message in storage.
     */
    public function store(Request $request)
    {
        // Validation and creation logic remains the same...
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|min:1',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}