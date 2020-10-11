<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        <article>
            <header class="mb-16">
                <h1 class="text-4xl lg:text-6xl font-bold">Listings</h1>
            </header>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 col-gap-20 row-gap-16">
                @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing" />
                @endforeach
            </div>

            <div class="pt-16">
                {{ $listings->links() }}
            </div>
        </article>
    </div>
</x-layouts.app>
