<?php

namespace App\Http\Livewire\Conversations;

use Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Marketplaceful\Actions\CreateConversation;
use Marketplaceful\Actions\CreateOrder;
use Marketplaceful\Models\Listing;
use Marketplaceful\Models\Conversation;

class CreateConversationForm extends Component
{
    public Listing $listing;

    public $message;

    public function createConversation(CreateOrder $creator)
    {
        $this->resetErrorBag();

        $order = $creator->create(
            Auth::user(),
            $this->listing,
            collect()
                ->when($this->message, fn ($state) => $state->merge(['message' => $this->message]))
                ->toArray()
        );

        $order->markAsOpen();

        return redirect(route('conversations.index'));
    }

    public function render()
    {
        return view('livewire.conversations.create-conversation-form');
    }
}
