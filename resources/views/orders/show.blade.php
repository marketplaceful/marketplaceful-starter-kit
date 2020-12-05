<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        Great success, {{ $user->name }}!
        <br>
        @if ($order->isPending())
            You have requested to buy <a class="underline" href="{{ route('listings.show', $order->listing->slug) }}">{{ $order->listing->title }}</a>.
            <br>
            {{ $order->provider->name }} has been notified about the booking request. Sit back and relax.
        @elseif ($order->isAccepted())
            Your buying for <a class="underline" href="{{ route('listings.show', $order->listing->slug) }}">{{ $order->listing->title }}</a> has been accepted.
        @elseif ($order->isDelivered())
            {{ $order->customer->name }}, your buying for <a class="underline" href="{{ route('listings.show', $order->listing->slug) }}">{{ $order->listing->title }}</a> has been completed.
        @endif

        <hr>

        <textarea cols="30" rows="10"></textarea>
        <br>
        <button>Send a menssage</button>

        <hr>

        @if ($order->isAccepted())
            <livewire:orders.deliver-order-form :order="$order" />
        @endif
    </div>
</x-layouts.app>
