<x-layouts.app>
    <div class="max-w-5xl mx-auto relative mt-16">
        <article class="max-w-2xl mx-auto content">
            <header class="mb-16">
                <h1 class="text-4xl lg:text-6xl font-bold">Inbox</h1>
            </header>

            <livewire:conversations.conversation-list :conversations="$conversations" />
        </article>
    </div>
</x-layouts.app>
