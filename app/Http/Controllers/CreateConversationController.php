<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Listing;

class CreateConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($listingSlug)
    {
        return view('conversations.create', [
            'listing' => Listing::whereSlug($listingSlug)->firstOrFail(),
        ]);
    }
}
