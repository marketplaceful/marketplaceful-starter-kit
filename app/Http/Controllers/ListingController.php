<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Listing;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $listings = Listing::simplePaginate(9);

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

    public function create()
    {
        return view('listings.create');
    }
}
