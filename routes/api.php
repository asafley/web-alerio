<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('v1')->group(function () {
    route::prefix('admin')->group(function () {
        Route::apiResource('posts', PostController::class);
        Route::apiResource('contacts', \App\Http\Controllers\ContactController::class);
        Route::apiResource('industries', \App\Http\Controllers\IndustryController::class);
        Route::apiResource('services', \App\Http\Controllers\ServiceController::class);
        Route::apiResource('faqs', \App\Http\Controllers\QuestionController::class);
        Route::apiResource('media', \App\Http\Controllers\MediaController::class);
        Route::apiResource('partners', \App\Http\Controllers\PartnerController::class);
        Route::apiResource('testimonials', \App\Http\Controllers\TestimonialController::class);
        Route::apiResource('roles', \App\Http\Controllers\RoleController::class);
        Route::apiResource('permissions', \App\Http\Controllers\PermissionController::class);
        Route::apiResource('projects', \App\Http\Controllers\ProjectController::class);
        Route::apiResource('settings', \App\Http\Controllers\SettingController::class);
    });

    route::prefix('public')->group(function (){
        Route::get('faqs', [\App\Http\Controllers\QuestionController::class, 'publicIndex']);
    });
});
