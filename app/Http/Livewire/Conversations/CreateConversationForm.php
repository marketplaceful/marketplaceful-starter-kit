<?php

namespace App\Http\Livewire\Conversations;

use Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Marketplaceful\Actions\CreateConversation;
use Marketplaceful\Models\Listing;
use Marketplaceful\Models\Conversation;

class CreateConversationForm extends Component
{
    public Listing $listing;

    public $state = [
        'body' => '',
    ];

    public function createConversation(CreateConversation $creator)
    {
        $this->resetErrorBag();

        $creator->create(
            Auth::user(),
            $this->listing,
            $this->state,
        );

        return redirect(route('conversations.index'));
    }

    public function render()
    {
        return view('livewire.conversations.create-conversation-form');
    }
}
