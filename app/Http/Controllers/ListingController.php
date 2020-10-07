<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Listing;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::get();

        return view('listings.index', [
            'listings' => $listings,
        ]);
    }

    public function show($listingSlug)
    {
        $listing = Listing::where('slug', $listingSlug)->firstOrFail();

        return view('listings.show', [
            'listing' => $listing,
        ]);
    }
}
