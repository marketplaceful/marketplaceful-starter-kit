<?php

namespace App\Http\Livewire\Conversations;

use Auth;
use Livewire\Component;
use Marketplaceful\Models\Order;
use Marketplaceful\Actions\CreateConversation;

class CreateConversationForm extends Component
{
    public Order $order;

    public $message;

    public function createConversation(CreateConversation $creator)
    {
        $this->resetErrorBag();

        $conversation = $creator->create(
            Auth::user(),
            $this->order,
            ['body' => $this->message]
        );

        if (Auth::user()->providesOrder($this->order)) {
            return redirect(route('user.sales.show', $this->order));
        } else {
            return redirect(route('user.orders.show', $this->order));
        }
    }

    public function render()
    {
        return view('livewire.conversations.create-conversation-form');
    }
}
