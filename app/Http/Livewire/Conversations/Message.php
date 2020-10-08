<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;

class Message extends Component
{
    public Message $message;

    public function render()
    {
        return view('livewire.conversations.message');
    }
}
