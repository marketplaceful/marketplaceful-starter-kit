<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class OrderList extends Component
{
    public Collection $orders;

    public function render()
    {
        return view('livewire.orders.order-list');
    }
}
