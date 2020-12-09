<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Conversation;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('conversations.index', [
            'conversations' => $request->user()->conversations()->orderBy('last_message_at', 'desc')->get(),
        ]);
    }

    public function show(Conversation $conversation, Request $request)
    {
        $this->authorize('show', $conversation);

        $request->user()->conversations()->updateExistingPivot($conversation, [
            'read_at' => now(),
        ]);

        return view('conversations.show', [
            'conversation' => $conversation,
            'listing' => $conversation->order->listing,
        ]);
    }
}
