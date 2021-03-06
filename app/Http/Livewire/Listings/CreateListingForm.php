<?php

namespace App\Http\Livewire\Listings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Marketplaceful\Actions\CreateListing;
use Marketplaceful\Actions\PublishListing;

class CreateListingForm extends Component
{
    use WithFileUploads;

    public $state = [];

    public $image;

    public $tags;

    public $currentTags = [];

    public function createListing(CreateListing $creator, PublishListing $publisher)
    {
        $this->resetErrorBag();

        $listing = $creator->create(
            Auth::user(),
            $this->image
                ? array_merge($this->state, ['image' => $this->image, 'tags' => $this->currentTags])
                : array_merge($this->state, ['tags' => $this->currentTags]),
        );

        $publisher->publish(Auth::user(), $listing);

        return redirect(route('listings.index'));
    }

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('livewire.listings.create-listing-form');
    }
}
