<div>
    @foreach ($messages as $message)
        @if ($message->isOwn())
            <livewire:conversations.message-own :message="$message" :key="$message->id" />
        @else
            <livewire:conversations.message :message="$message" :key="$message->id" />
        @endif
    @endforeach
</div>
