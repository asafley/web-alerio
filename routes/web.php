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

    // Group of routes to manage contacts via form
    Route::prefix('/contacts')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.contacts.index');
        })->name('admin.contacts');

        // Page to manage blog posts
        Route::get('/create', function () {
            return view('admin.contacts.editor');
        })->name('admin.contacts.create');

        // Page to manage blog contacts
        Route::get('/edit/{contactId}', function ($contactId) {
            return view('admin.contacts.editor', ['contactId' => $contactId]);
        })->name('admin.contacts.edit');
    });

    // Page to view dashboard and analytics
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Group of routes to manage industrials / verticals
    Route::prefix('/industries')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.industries.index');
        })->name('admin.industries');

        // Page to manage blog posts
        Route::get('/create', function () {
            return view('admin.industries.editor');
        })->name('admin.industries.create');

        // Page to manage blog contacts
        Route::get('/edit/{industryId}', function ($industryId) {
            return view('admin.industries.editor', ['industryId' => $industryId]);
        })->name('admin.industries.edit');
    });

    // Group of routes to manage media
    Route::prefix('/media')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.media.index');
        })->name('admin.media');

        // Page to manage blog posts
        Route::get('/create', function () {
            return view('admin.media.editor');
        })->name('admin.media.create');

        // Page to manage blog media
        Route::get('/edit/{mediaId}', function ($mediaId) {
            return view('admin.media.editor', ['mediaId' => $mediaId]);
        })->name('admin.media.edit');
    });

    // Group of routes to manage partners
    Route::prefix('/partners')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.partners.index');
        })->name('admin.partners');

        // Page to manage blog posts
        Route::get('/create', function () {
            return view('admin.partners.editor');
        })->name('admin.partners.create');

        // Page to manage blog partners
        Route::get('/edit/{partnerId}', function ($partnerId) {
            return view('admin.partners.editor', ['partnerId' => $partnerId]);
        })->name('admin.partners.edit');
    });

    // Group of routes to manage blog posts
    Route::prefix('/posts')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.posts.index');
        })->name('admin.posts');

        // Page to manage blog posts
        Route::get('/create', function () {
            return view('admin.posts.editor');
        })->name('admin.posts.create');

        // Page to manage blog posts
        Route::get('/edit/{postId}', function ($postId) {
            return view('admin.posts.editor', ['postId' => $postId]);
        })->name('admin.posts.edit');
    });

    // Group of routes for projects
    Route::prefix('/projects')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.projects.index');
        })->name('admin.projects');

        // Page to manage post entries
        Route::get('/create', function () {
            return view('admin.projects.editor');
        })->name('admin.projects.create');

        // Page to manage projects
        Route::get('/edit/{projectId}', function ($projectId) {
            return view('admin.projects.editor', ['projectId' => $projectId]);
        })->name('admin.projects.edit');
    });

    // Group of routes for faqs
    Route::prefix('/faqs')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.faqs.index');
        })->name('admin.faqs');

        // Page to manage post entries
        Route::get('/create', function () {
            return view('admin.faqs.editor');
        })->name('admin.faqs.create');

        // Page to manage faqs
        Route::get('/edit/{faqId}', function ($faqId) {
            return view('admin.faqs.editor', ['faqId' => $faqId]);
        })->name('admin.faqs.edit');
    });

    // Page to manage roles and permissions
    Route::get('/rp', function () {
        return view('admin.rp');
    })->name('admin.rp');

    // Group of routes for settings
    Route::prefix('/settings')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.settings.index');
        })->name('admin.settings');

        // Page to manage post entries
        Route::get('/create', function () {
            return view('admin.settings.editor');
        })->name('admin.settings.create');

        // Page to manage settings
        Route::get('/edit/{settingId}', function ($settingId) {
            return view('admin.settings.editor', ['settingId' => $settingId]);
        })->name('admin.settings.edit');
    });

    // Group of routes for services
    Route::prefix('/services')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.services.index');
        })->name('admin.services');

        // Page to manage post entries
        Route::get('/create', function () {
            return view('admin.services.editor');
        })->name('admin.services.create');

        // Page to manage services
        Route::get('/edit/{serviceId}', function ($serviceId) {
            return view('admin.services.editor', ['serviceId' => $serviceId]);
        })->name('admin.services.edit');
    });

    // Group of routes for testimonials
    Route::prefix('/testimonials')->group(function () {
        // Page to manage blog categories
        Route::get('/', function () {
            return view('admin.testimonials.index');
        })->name('admin.testimonials');

        // Page to manage post entries
        Route::get('/create', function () {
            return view('admin.testimonials.editor');
        })->name('admin.testimonials.create');

        // Page to manage testimonials
        Route::get('/edit/{testimonialId}', function ($testimonialId) {
            return view('admin.testimonials.editor', ['testimonialId' => $testimonialId]);
        })->name('admin.testimonials.edit');
    });

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
