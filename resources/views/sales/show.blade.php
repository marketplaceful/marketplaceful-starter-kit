<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        <article>
            <div class="mb-8">
                @if ($order->isPending())
                    <h1 class="block font-bold text-5xl">
                        {{ $order->customer->name }} has requested to buy <a href="{{ route('listings.show', $listing->slug) }}" class="underline">{{ $listing->title }}</a>
                    </h1>
                    <div class="text-gray-500">{{ $order->customer->name }} is waiting for your response.</div>
                @elseif ($order->isAccepted())
                    <h1 class="block font-bold text-5xl">
                        You accepted a request from {{ $order->customer->name }} to buy <a class="underline" href="{{ route('listings.show', $listing->slug) }}">{{ $listing->title }}</a> has been accepted.
                    </h1>
                @elseif ($order->isDelivered())
                    <h1 class="block font-bold text-5xl">
                        The buying from {{ $order->customer->name }} for <a class="underline" href="{{ route('listings.show', $order->listing->slug) }}">{{ $listing->title }}</a> has been completed.
                    </h1>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 col-gap-24">
                <span class="hidden md:block">
                    <section class="block">
                        <section class="flex align-center mb-8">
                            <img class="w-32 h-32 flex-shrink-0 rounded-lg shadow object-cover mr-5" src="{{ $listing->feature_image_url }}" alt="">
                            <div class="flex flex-col justify-center flex-1">
                                <h3 class="font-bold block text-lg ">
                                    {{ $listing->title }}
                                </h3>
                            </div>
                            <div class="flex flex-col justify-center items-end">
                                <div class="text-xl">$ {{ $listing->price_for_humans }}</div>
                            </div>
                        </section>

                        @if ($order->isPending())
                            <div class="flex justify-end space-x-4">
                                <livewire:orders.decline-order-form :order="$order" />
                                <livewire:orders.accept-order-form :order="$order" />
                            </div>
                        @endif
                    </section>
                </span>
                <div class="w-full grid grid-cols-1 row-gap-5">
                    <livewire:conversations.message-list :messages="$order->conversation->messages" />
                    <livewire:conversations.reply-conversation-form :conversation="$order->conversation" />
                </div>
            </div>
        </article>
    </div>
</x-layouts.app>
