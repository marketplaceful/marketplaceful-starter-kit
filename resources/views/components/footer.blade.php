<nav class="flex items-center justify-between flex-wrap py-12 lg:py-24 max-w-5xl mx-auto">
    <div class="flex space-x-6 md:order-2">
         @foreach (config('marketplaceful.social') as $social)
            <a href="{{ $social['url'] }}" rel="noopener">
                <span class="sr-only">{{ $social['name'] }}</span>
                {{ svg($social['icon'])->class('h-6 w-6 hover:text-purple-600') }}
            </a>
        @endforeach
    </div>
    <p class="mt-8 text-sm leading-6 md:mt-0 md:order-1">
        &copy; {{ now()->format('Y') }} {{ config('app.name') }} – Powered by <a href="https://marketplaceful.com" class="hover:text-purple-600">Marketplaceful</a>
    </p>
</nav>
