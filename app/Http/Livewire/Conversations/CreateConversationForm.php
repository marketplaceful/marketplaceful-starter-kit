<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;
use Illuminate\Support\Str;
use Marketplaceful\Models\Listing;
use Marketplaceful\Models\Conversation;

class CreateConversationForm extends Component
{
    public Listing $listing;

    public $body = [];

    public function createListing()
    {
        $this->validate([
            'body' => 'required',
        ]);

        $conversation = Conversation::create([
            'uuid' => Str::uuid(),
            'listing_id' => $this->listing->id,
            'last_message_at' => now(),
        ]);

        $conversation->messages()->create([
            'user_id' => auth()->id(),
            'body' => $this->body,
        ]);

        $conversation->users()->sync([
            auth()->id(),
            $this->listing->author->id,
        ]);
    }

    public function render()
    {
        return view('livewire.conversations.create-conversation-form');
    }
}
