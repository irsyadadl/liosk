<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

Route::get('/login/{id}', function ($id = null) {
    Auth::login(User::find($id));
    return redirect(RouteServiceProvider::HOME);
});

