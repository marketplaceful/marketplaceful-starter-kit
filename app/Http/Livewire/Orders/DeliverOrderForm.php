<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use Marketplaceful\Models\Order;

class DeliverOrderForm extends Component
{
    public Order $order;

    public function deliverOrder()
    {
        $this->order->markAsDelivered();

        return redirect()->route('user.orders.show', ['order' => $this->order]);
    }

    public function render()
    {
        return view('livewire.orders.deliver-order-form');
    }
}
