<x-user-layout>
    <x-slot name="header">Dashboard</x-slot>
    Hey <strong>{{ firstWord(auth()->user()->name) }}</strong>, you are logged in!

</x-user-layout>
