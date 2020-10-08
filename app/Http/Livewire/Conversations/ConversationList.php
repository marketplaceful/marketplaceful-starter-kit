<?php

namespace App\Http\Livewire\Conversations;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ConversationList extends Component
{
    public Collection $conversations;

    public function render()
    {
        return view('livewire.conversations.conversation-list');
    }
}
