<?php

use App\Livewire\Actions\Logout;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;

layout('layouts.guest');

$sendVerification = function () {
    if (auth()->user()->hasVerifiedEmail()) {
        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );

        return;
    }

    auth()->user()->sendEmailVerificationNotification();

    Session::flash('status', 'verification-link-sent');
};

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<div>
    <div class="mb-4 text-sm text-muted-foreground">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-500">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <x-button wire:click="sendVerification">
            {{ __('Resend Verification Email') }}
        </x-button>

        <button wire:click="logout" type="submit" class="underline text-sm text-muted-foreground hover:text-foreground">
            {{ __('Log Out') }}
        </button>
    </div>
</div>
