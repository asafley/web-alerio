<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Legal Routes
Route::prefix('legal')->group(function () {
    Route::get('/privacy', function () {
        return view('privacy');
    });

    Route::get('/tos', function () {
        return view('tos');
    });

    route::get('/accessibility', function () {
        return view('accessibility');
    });
});

// Default Routes
Route::get('/default', function () {
    return view('welcome');
})->name('default');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
