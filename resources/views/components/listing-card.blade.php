<div class="block">
    <a href="{{ route('listings.show', $listing->slug) }}" class="block w-full">
        <img class="w-full rounded-lg h-64 object-cover transform duration-700 hover:shadow-2xl hover:-translate-y-2" src="{{ $listing->feature_image_url }}" alt="">
        <h1 class="mt-6 text-xl leading-7 font-semibold text-gray-900 text-center">{{ $listing->title }}</h1>
        <p class="text-lg font-medium leading-6 text-gray-600 text-center mt-3">
            $ {{ $listing->price_for_humans }}
        </p>
    </a>
</div>
