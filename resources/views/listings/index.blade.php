<x-layouts.app>
    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <main class="mt-8 md:mt-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 col-gap-20 row-gap-16">
                    @foreach ($listings as $listing)
                        <x-listing-card :listing="$listing" />
                    @endforeach
                </div>
            </main>
        </div>
    </div>
</x-layouts.app>
