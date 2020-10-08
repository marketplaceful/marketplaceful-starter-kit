<x-layouts.app>
    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <main class="mt-8 md:mt-12">
                <div class="grid grid-cols-1 md:grid-cols-2 row-gap-8 col-gap-20">
                    <aside>
                        <img class="rounded-lg" src="{{ $listing->feature_image_url }}" alt="">
                    </aside>
                    <div>
                        <div>
                            <h1 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                                {{ $listing->title }}
                            </h1>
                            <div class="mt-3 text-xl leading-8 text-gray-900 font-semibold sm:mt-4">
                                € {{ $listing->price_for_humans }}
                            </div>

                            <div class="flex mt-6"></div>

                            <p class="mt-8 text-xl text-gray-500 leading-8">{{ $listing->description }}</p>

                            <div class="flex mt-6">
                                <a href="{{ route('conversations.create', $listing->slug) }}" class="flex bg-green-400 text-white py-4 px-5 rounded-lg font-medium">
                                    Contact seller
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layouts.app>
