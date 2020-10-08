<x-layouts.app>
    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <main class="mt-8 md:mt-12">
                <livewire:conversations.message-list :messages="$conversation->messages" />
                <livewire:conversations.reply-conversation-form :conversation="$conversation" />
            </main>
        </div>
    </div>
</x-layouts.app>
