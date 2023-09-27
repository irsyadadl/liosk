<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    #[Rule(['required', 'string', 'current_password'])]
    public string $password = '';

    public function deleteUser(): void
    {
        $this->validate();

        tap(auth()->user(), fn () => auth()->logout())->delete();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }
}; ?>

<x-card class="space-y-6">
    <x-slot name="header">
        <x-slot name="title">{{ __('Delete Account') }}</x-slot>
        <x-slot name="description">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</x-slot>
    </x-slot>
    <x-slot name="content">
        <x-button variant="destructive"
                  x-data=""
                  x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Delete Account') }}</x-button>

        <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
            <form wire:submit="deleteUser" class="p-6">

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-muted-foreground">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <x-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-input
                        wire:model="password"
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-button variant="secondary" x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-button>

                    <x-button variant="destructive" class="ml-3">
                        {{ __('Delete Account') }}
                    </x-button>
                </div>
            </form>
        </x-modal>
    </x-slot>
</x-card>
