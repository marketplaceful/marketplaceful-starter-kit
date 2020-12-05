<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        @if ($order->isPending())
            {{ $order->customer->name }} has requested to buy <a href="{{ route('listings.show', $order->listing->slug) }}">{{ $order->listing->title }}</a>.
            <br><br>
            {{ $order->customer->name }} is waiting for your response.
        @elseif ($order->isAccepted())
            You accepted a request from {{ $order->customer->name }} to buy <a class="underline" href="{{ route('listings.show', $order->listing->slug) }}">{{ $order->listing->title }}</a>.
        @elseif ($order->isDelivered())
            The buying from {{ $order->customer->name }} for <a class="underline" href="{{ route('listings.show', $order->listing->slug) }}">{{ $order->listing->title }}</a> has been completed.
        @endif

        <hr>

        <textarea cols="30" rows="10"></textarea>
        <br>
        <button>Send a menssage</button>

        <hr>

        @if ($order->isPending())
            <livewire:orders.accept-order-form :order="$order" />
            <br>
            <livewire:orders.decline-order-form :order="$order" />
        @endif
    </div>
</x-layouts.app>
