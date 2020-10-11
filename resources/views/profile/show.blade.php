<x-layouts.app>
    <div>
        <div class="max-w-5xl mx-auto relative mt-16">
            <header class="mb-16">
                <h1 class="text-4xl lg:text-6xl font-bold">Profile</h1>
            </header>

            @livewire('profile.update-profile-information-form')

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
            @endif

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        </div>
    </div>
</x-layouts.app>
