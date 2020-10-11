<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 col-gap-20 row-gap-16">
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        </div>
    </div>
</x-layouts.app>
