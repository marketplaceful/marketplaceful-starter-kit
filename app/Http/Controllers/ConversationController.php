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
            'conversations' => $request->user()->conversations,
        ]);
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', [
            'conversation' => $conversation,
            'listing' => $conversation->listing,
        ]);
    }
}
