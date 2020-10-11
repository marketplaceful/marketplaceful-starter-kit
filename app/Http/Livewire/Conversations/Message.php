<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;
use Marketplaceful\Models\Message as MessageModel;

class Message extends Component
{
    public MessageModel $message;

    public function mount(MessageModel $message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.conversations.message');
    }
}
