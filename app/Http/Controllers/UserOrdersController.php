<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Order;

class UserOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('orders.index', [
            'orders' => $request->user()->orders()->latest()->get(),
        ]);
    }

    public function show(Order $order, Request $request)
    {
        abort_unless($order->customer()->is($request->user()), 401);

        return view('orders.show', [
            'order' => $order,
            'listing' => $order->listing,
            'user' => $request->user(),
        ]);
    }
}
