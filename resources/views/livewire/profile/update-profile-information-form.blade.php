<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public mixed $about = '';

    public function mount(): void
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->about = auth()->user()->about;
    }

    public function updateProfileInformation(): void
    {
        $user = auth()->user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'about' => [],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    public function sendVerification(): void
    {
        $user = auth()->user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        session()->flash('status', 'verification-link-sent');
    }
}; ?>

<x-card>
    <x-slot name="header">
        <x-slot name="title">
            {{ __('Profile Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __("Update your account's profile information and email address.") }}
        </x-slot>
    </x-slot>

    <x-slot name="content">

    <form wire:submit="updateProfileInformation" class="space-y-6">
        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input wire:model="name" id="name" name="name" type="text" class="mt-1" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input wire:model="email" id="email" name="email" type="email" class="mt-1" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-muted-foreground hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>


        <div>
            <x-label for="about" :value="__('About')" />
            <x-textarea wire:model="about" id="about" name="about" type="text" class="mt-1" autocomplete="about" />
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button>{{ __('Save') }}</x-button>

            <x-action-message class="mr-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
    </x-slot>
</x-card>
