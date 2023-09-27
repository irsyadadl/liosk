<x-app-layout>
    <x-header>
        {{ __('Dashboard') }}
    </x-header>

    <x-container>
        Hey <strong>{{ firstWord(auth()->user()->name) }}</strong>, you are logged in!
    </x-container>
</x-app-layout>
