<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;
use Marketplaceful\Models\Message;
use Illuminate\Database\Eloquent\Collection;

class MessageList extends Component
{
    public Collection $messages;

    public function getListeners()
    {
        return [
            'message.created' => 'prependMessage',
        ];
    }

    public function prependMessage($id)
    {
        $this->messages->prepend(Message::find($id));
    }

    public function render()
    {
        return view('livewire.conversations.message-list');
    }
}
