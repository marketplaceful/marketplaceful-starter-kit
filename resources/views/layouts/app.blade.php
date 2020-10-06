<x-layouts.base>
    <div class="min-h-screen">
        @livewire('navigation-dropdown')

        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
</x-layouts.base>
