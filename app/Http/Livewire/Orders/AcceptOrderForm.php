<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use Marketplaceful\Models\Order;

class AcceptOrderForm extends Component
{
    public Order $order;

    public function acceptOrder()
    {
        $this->order->markAsAccepted();

        return redirect()->route('user.sales.show', ['order' => $this->order]);
    }

    public function render()
    {
        return view('livewire.orders.accept-order-form');
    }
}
