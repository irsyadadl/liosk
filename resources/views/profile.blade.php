<x-app-layout>
    <x-header>{{ __('Profile') }}</x-header>

    <x-container>
        <div class="max-w-xl space-y-6">
            <livewire:profile.update-profile-information-form />
            <livewire:profile.update-password-form />
            <livewire:profile.delete-user-form />
        </div>
    </x-container>
</x-app-layout>
