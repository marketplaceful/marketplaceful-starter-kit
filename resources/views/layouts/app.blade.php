<x-layouts.base>
    <div class="bg-white font-sans leading-normal text-gray-800 px-4 sm:px-10">
        @livewire('navigation-dropdown')

        {{ $slot }}

        <x-footer />
    </div>

    @stack('modals')
</x-layouts.base>
