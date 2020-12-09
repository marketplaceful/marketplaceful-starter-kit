<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        <article>
            <div class="grid grid-cols-1 md:grid-cols-2 row-gap-8 col-gap-20">
                <aside>
                    <img class="rounded-lg" src="{{ $listing->feature_image_url }}" alt="">
                </aside>
                <div>
                    <div>
                        <h1 class="text-4xl lg:text-6xl font-bold leading-none">
                            {{ $listing->title }}
                        </h1>
                        <div class="mt-3 text-2xl leading-8 font-semibold sm:mt-4">
                            € {{ $listing->price_for_humans }}
                        </div>

                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ $listing->author->profile_photo_url }}" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium">
                                    {{ $listing->author->name }}
                                </p>
                            </div>
                        </div>

                        <div class="flex mt-6"></div>

                        <p class="mt-8 text-lg leading-8">{{ $listing->description }}</p>

                        <div class="flex mt-6">
                            <a href="{{ route('checkout.create', $listing->slug) }}" class="flex bg-purple-600 text-white py-4 px-5 rounded-lg font-medium">
                                Request to buy
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>

</x-layouts.app>
