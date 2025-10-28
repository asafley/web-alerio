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
    // Page for Privacy Policy
    Route::get('/privacy', function () {
        return view('legal.privacy');
    })->name('legal.privacy');

    // Page for Terms of Service
    Route::get('/tos', function () {
        return view('legal.tos');
    })->name('legal.tos');

    // Page for Accessibility Statement
    route::get('/accessibility', function () {
        return view('legal.accessibility');
    })->name('legal.accessibility');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Admin Home
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');

    // Page to manage Contact Form submissions
    Route::get('/contacts', function () {
        return view('admin.contacts');
    })->name('admin.contacts');

    // Page to view dashboard and analytics
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Page to manage industries for homepage
    Route::get('/industries', function () {
        return view('admin.industries');
    })->name('admin.industries');

    // Page to manage media assets
    Route::get('/media', function () {
        return view('admin.media');
    })->name('admin.media');

    // Page to manage partners on homepage
    Route::get('/partners', function () {
        return view('admin.partners');
    })->name('admin.partners');

    // Page to manage blog posts
    Route::get('/posts', function () {
        return view('admin.posts');
    })->name('admin.posts');

    // Page to manage project highlights
    Route::get('/projects', function () {
        return view('admin.projects');
    })->name('admin.projects');

    // Page to manage FAQ
    Route::get('/faqs', function () {
        return view('admin.faqs');
    })->name('admin.faqs');

    // Page to manage roles and permissions
    Route::get('/rp', function () {
        return view('admin.rp');
    })->name('admin.rp');

    // Page to manage site settings
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

    // Page to manage services offered
    Route::get('/services', function () {
        return view('admin.services');
    })->name('admin.services');

    // Page to manage testimonials
    Route::get('/testimonials', function () {
        return view('admin.testimonials');
    })->name('admin.testimonials');

    // Page to manage users
    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
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
