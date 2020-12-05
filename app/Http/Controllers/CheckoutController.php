<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Listing;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($listingSlug)
    {
        return view('checkout.create', [
            'listing' => Listing::whereSlug($listingSlug)->firstOrFail(),
        ]);
    }
}
