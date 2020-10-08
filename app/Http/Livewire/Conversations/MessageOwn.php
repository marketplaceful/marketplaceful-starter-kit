<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;
use Marketplaceful\Models\Message;

class MessageOwn extends Component
{
    public Message $message;

    public function render()
    {
        return view('livewire.conversations.message-own');
    }
}
