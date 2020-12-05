<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        @foreach ($orders as $order)
            <a href="{{ route('user.sales.show', $order) }}">{{ $order->listing->title }}</a> -> {{ $order->status }}
        @endforeach
    </div>
</x-layouts.app>
