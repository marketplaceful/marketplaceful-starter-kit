<?php

namespace App\Http\Livewire\Conversations;

use Auth;
use Livewire\Component;
use Marketplaceful\Actions\ReplyConversation;
use Marketplaceful\Models\Conversation;

class ReplyConversationForm extends Component
{
    public Conversation $conversation;

    public $state = [
        'body' => '',
    ];

    public function replyConversation(ReplyConversation $replicator)
    {
        $this->resetErrorBag();

        $message = $replicator->reply(
            Auth::user(),
            $this->conversation,
            $this->state,
        );

        $this->emit('message.created', $message->id);

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.conversations.reply-conversation-form');
    }
}
