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
            'orders' => $request->user()->orders()->paginate(10),
        ]);
    }

    public function show(Order $order, Request $request)
    {
        return view('orders.show', [
            'order' => $order,
            'user' => $request->user(),
        ]);
    }
}
