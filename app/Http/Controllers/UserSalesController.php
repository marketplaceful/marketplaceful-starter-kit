<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Order;

class UserSalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('sales.index', [
            'orders' => $request->user()->sales,
        ]);
    }

    public function show(Order $order, Request $request)
    {
        return view('sales.show', [
            'order' => $order,
            'listing' => $order->listing,
            'user' => $request->user(),
        ]);
    }
}
