<div class="block">
    <a href="{{ route('listings.show', $listing->slug) }}" class="block w-full">
        <img class="w-full rounded-lg h-64 object-cover transform duration-700 hover:shadow-2xl hover:-translate-y-2" src="{{ $listing->feature_image_url }}" alt="">
        <h1 class="mt-4 text-2xl leading-8 font-bold text-center">{{ $listing->title }}</h1>
        <p class="text-lg font-medium leading-6 text-gray-800 text-center mt-2">
            $ {{ $listing->price_for_humans }}
        </p>
    </a>
</div>
