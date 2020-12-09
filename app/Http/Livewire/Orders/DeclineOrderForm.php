<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use Marketplaceful\Models\Order;

class DeclineOrderForm extends Component
{
    public Order $order;

    public function declineOrder()
    {
        $this->order->markAsDeclined();

        return redirect()->route('user.orders.show', ['order' => $this->order]);
    }

    public function render()
    {
        return view('livewire.orders.decline-order-form');
    }
}
