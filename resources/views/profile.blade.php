<x-user-layout>
    <x-slot name="header">{{ __('Profile') }}</x-slot>

    <div class="space-y-6">
        <livewire:profile.update-profile-information-form />
        <livewire:profile.update-password-form />
        <livewire:profile.delete-user-form />
    </div>
</x-user-layout>
