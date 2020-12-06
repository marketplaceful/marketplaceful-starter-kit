<?php

namespace App\Http\Livewire\Listings;

use App\Models\User;
use Livewire\Component;
use Marketplaceful\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Marketplaceful\Actions\CreateConversation;
use Marketplaceful\Actions\CreateOrder;

class CheckoutForm extends Component
{
    public Listing $listing;

    public $message;

    public function createOrder(CreateOrder $orderCreator, CreateConversation $conversationCreator)
    {
        $this->resetErrorBag();

        $order = $orderCreator->create(
            Auth::user(),
            $this->listing
        );

        $order->markAsPending();

        if ($this->message) {
            $conversationCreator->create(Auth::user(), $order, ['body' => $this->message]);
        }

        return redirect(route('conversations.index'));
    }

    public function render()
    {
        return view('livewire.listings.checkout-form');
    }
}
