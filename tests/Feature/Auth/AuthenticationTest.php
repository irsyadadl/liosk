<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Livewire\Volt\Volt;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response
        ->assertSeeVolt('auth.login')
        ->assertOk();
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $component = Volt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'password');

    $component->call('login');

    $component
        ->assertHasNoErrors()
        ->assertRedirect(RouteServiceProvider::HOME);

    $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $component = Volt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'wrong-password');

    $component->call('login');

    $component
        ->assertHasErrors()
        ->assertNoRedirect();

    $this->assertGuest();
});

test('navigation menu can be rendered', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/dashboard');

    $response->assertOk();
})->skip();

test('users can logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $this->post('/logout');

    $this->assertGuest();
});
