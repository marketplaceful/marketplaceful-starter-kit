<?php

namespace App\Http\Livewire\Listings;

use App\Models\User;
use Livewire\Component;
use Marketplaceful\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Marketplaceful\Actions\CreateOrder;

class CheckoutForm extends Component
{
    public Listing $listing;

    public $message;

    public $state = [];

    public function createOrder(CreateOrder $creator)
    {
        $this->resetErrorBag();

        $creator->create(
            Auth::user(),
            $this->listing,
            collect()
                ->when($this->message, fn () => ['message' => $this->message])
                ->toArray()
        );

        return redirect(route('conversations.index'));
    }

    public function render()
    {
        return view('livewire.listings.checkout-form');
    }
}
