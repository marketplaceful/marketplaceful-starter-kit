<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;
use Marketplaceful\Models\Conversation;

class ReplyConversationForm extends Component
{
    public Conversation $conversation;

    public $body = '';

    public function reply()
    {
        $this->validate([
            'body' => 'required',
        ]);

        $message = $this->conversation->messages()->create([
            'user_id' => auth()->id(),
            'body' => $this->body,
        ]);

        $this->conversation->update([
            'last_message_at' => now(),
        ]);

        foreach ($this->conversation->others as  $user) {
            $user->conversations()->updateExistingPivot($this->conversation, [
                'read_at' => now(),
            ]);
        }

        $this->emit('message.created', $message->id);

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.conversations.reply-conversation-form');
    }
}
