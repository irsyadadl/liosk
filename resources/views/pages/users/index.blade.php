<?php
\Laravel\Folio\middleware('auth');
$users = \App\Models\User::query()->latest()->paginate(10);
?>

<x-user-layout title="Users">
    <x-slot name="header">Users</x-slot>
    Fetching users...
</x-user-layout>
